<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Package;
use App\Models\TimeSlot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BookingController extends Controller
{
    /**
     * ADMIN - Halaman Daftar Semua Booking
     */
    public function index()
    {
        $bookings = Booking::with('package')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('admin.booking.index', compact('bookings'));
    }

    /**
     * USER - pesanan aktif
     */
    public function userBooking()
    {
        $email = auth()->user()->email;

        $bookings = Booking::with('package')
            ->where('email', $email)
            ->where('status', '!=', 'Selesai')
            ->latest()
            ->get();

        return view('booking3', compact('bookings'));
    }

    /**
     * USER - riwayat selesai
     */
    public function riwayat()
    {
        $email = auth()->user()->email;

        $bookings = Booking::with('package')
            ->where('email', $email)
            ->where('status', 'Selesai')
            ->latest()
            ->get();

        return view('riwayat', compact('bookings'));
    }

    /**
     * Tampilkan halaman daftar packages
     */
    public function packages()
    {
        $packages = Package::all();
        return view('packages', compact('packages'));
    }

    /**
     * Halaman Booking Step 1 - Pilih Tanggal & Waktu
     */
    public function booking1(Request $request)
    {
        $request->validate([
            'package_id' => 'required|exists:packages,id'
        ]);

        $package = Package::findOrFail($request->package_id);
        
        return view('booking1', compact('package'));
    }

    /**
     * Halaman Booking Step 2 - Konfirmasi & Pembayaran
     * ✅ FIX 1: Gunakan createFromFormat untuk parsing tanggal yang aman
     */
    public function booking2(Request $request)
    {
        try {
            if (!$request->has(['package_id', 'tanggal', 'waktu', 'extra_people', 'zona_waktu'])) {
                return redirect()->route('packages')->with('error', 'Data tidak lengkap');
            }

            $package = Package::findOrFail($request->package_id);
            
            // ✅ FIX: Parsing tanggal dengan format eksplisit YYYY-MM-DD
            try {
                $tanggalFormatted = Carbon::createFromFormat('Y-m-d', $request->tanggal)
                    ->locale('id')
                    ->translatedFormat('d F Y');
            } catch (\Exception $e) {
                return redirect()->route('packages')->with('error', 'Format tanggal tidak valid. Gunakan YYYY-MM-DD');
            }
            
            $tanggal = $request->tanggal;
            $waktu = $request->waktu;
            $zonaWaktu = $request->zona_waktu;
            $extraPeople = (int) $request->extra_people;
            $hargaPaket = $package->price;
            $hargaExtra = $extraPeople * 25000;
            $totalPembayaran = $hargaPaket + $hargaExtra;
            
            $bookingData = [
                'package_id' => $request->package_id,
                'tanggal' => $tanggal,
                'tanggalFormatted' => $tanggalFormatted,
                'waktu' => $waktu,
                'extra_people' => $extraPeople,
                'zona_waktu' => $zonaWaktu,
                'harga_paket' => $hargaPaket,
                'harga_extra_people' => $hargaExtra,
                'total_pembayaran' => $totalPembayaran,
            ];
            
            return view('booking2', compact(
                'package', 
                'bookingData', 
                'tanggal',
                'tanggalFormatted', 
                'waktu', 
                'zonaWaktu', 
                'extraPeople', 
                'hargaPaket', 
                'hargaExtra', 
                'totalPembayaran'
            ));
            
        } catch (\Exception $e) {
            return redirect()->route('packages')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Simpan booking ke database
     * ✅ FIX 2: Tambahkan pengecekan double booking di backend
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'package_id' => 'required|exists:packages,id',
            'nama_pelanggan' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'tanggal' => 'required|date_format:Y-m-d',
            'waktu' => 'required',
            'zona_waktu' => 'required|in:WIB,WITA,WIT',
            'extra_people' => 'required|integer|min:0',
            'metode_pembayaran' => 'required|in:qris,bca,dana',
            'izin_sosmed' => 'nullable|string|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            DB::beginTransaction();

            // ✅ FIX 2: CEK DOUBLE BOOKING SEBELUM SIMPAN
            $exists = Booking::whereDate('tanggal', $request->tanggal)
                ->where('waktu', $request->waktu)
                ->whereIn('status', ['Menunggu Pembayaran', 'Dikonfirmasi'])
                ->exists();

            if ($exists) {
                DB::rollBack();
                return response()->json([
                    'success' => false,
                    'message' => '❌ Maaf, jam ini sudah dibooking oleh orang lain. Silakan pilih jam lain.',
                    'error_type' => 'double_booking'
                ], 409);
            }

            $package = Package::findOrFail($request->package_id);

            $hargaPaket = $package->price;
            $hargaExtra = $request->extra_people * 25000;
            $totalPembayaran = $hargaPaket + $hargaExtra;

            $booking = Booking::create([
                'kode_booking' => Booking::generateKodeBooking(),
                'package_id' => $request->package_id,
                'nama_pelanggan' => $request->nama_pelanggan,
                'nomor_telepon' => $request->nomor_telepon,
                'email' => $request->email,
                'tanggal' => $request->tanggal,
                'waktu' => $request->waktu,
                'zona_waktu' => $request->zona_waktu,
                'durasi' => $package->duration . ' menit',
                'extra_people' => $request->extra_people,
                'harga_paket' => $hargaPaket,
                'harga_extra_people' => $hargaExtra,
                'total_pembayaran' => $totalPembayaran,
                'metode_pembayaran' => strtoupper($request->metode_pembayaran),
                'status' => 'Menunggu Pembayaran',
                'izin_sosmed' => $request->izin_sosmed,
                'catatan' => $request->catatan ?? null,
            ]);

            DB::commit();

            $waMessage = $this->generateWhatsAppMessage($booking);
            $waNumber = '62859109851955';
            $waUrl = "https://wa.me/{$waNumber}?text=" . urlencode($waMessage);

            return response()->json([
                'success' => true,
                'message' => 'Booking berhasil disimpan!',
                'data' => [
                    'booking_id' => $booking->id,
                    'kode_booking' => $booking->kode_booking,
                    'whatsapp_url' => $waUrl,
                ]
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Generate WhatsApp Message
     */
    private function generateWhatsAppMessage($booking)
    {
        $message = "🎉 *BOOKING BARU - BUMANTARA STUDIO*\n\n";
        $message .= "📋 *Kode Booking:* {$booking->kode_booking}\n";
        $message .= "━━━━━━━━━━━━━━━━━━━━\n\n";
        
        $message .= "👤 *DATA CUSTOMER*\n";
        $message .= "Nama: {$booking->nama_pelanggan}\n";
        $message .= "Telepon: {$booking->nomor_telepon}\n";
        $message .= "Email: {$booking->email}\n\n";
        
        $message .= "📸 *DETAIL PAKET*\n";
        $message .= "Paket: {$booking->package->name}\n";
        $message .= "Tanggal: {$booking->tanggal->format('d/m/Y')}\n";
        $message .= "Waktu: " . date('H:i', strtotime($booking->waktu)) . " {$booking->zona_waktu}\n";
        $message .= "Durasi: {$booking->durasi}\n";
        $message .= "Extra People: {$booking->extra_people} orang\n\n";
        
        $message .= "💰 *RINCIAN HARGA*\n";
        $message .= "Harga Paket: Rp " . number_format($booking->harga_paket, 0, ',', '.') . "\n";
        $message .= "Extra People: Rp " . number_format($booking->harga_extra_people, 0, ',', '.') . "\n";
        $message .= "━━━━━━━━━━━━━━━━━━━━\n";
        $message .= "TOTAL: *Rp " . number_format($booking->total_pembayaran, 0, ',', '.') . "*\n\n";
        
        $message .= "💳 *Metode Pembayaran:* " . strtoupper($booking->metode_pembayaran) . "\n\n";
        
        $message .= "Mohon konfirmasi dan lakukan pembayaran untuk menyelesaikan booking.\n\n";
        $message .= "Terima kasih! 🙏";
        
        return $message;
    }

    /**
     * API - Get Available Time Slots dengan Pengecekan Booking
     * ✅ FIX 3: Gunakan whereDate untuk keamanan lebih baik
     */
    public function getAvailableTimes(Request $request)
    {
        try {
            $date = $request->query('date');
            $timezone = $request->query('timezone', 'WIB');
            
            // Jika tanggal kosong, return semua time slots
            if (!$date) {
                $timeSlots = TimeSlot::where('is_active', 1)
                    ->orderBy('time')
                    ->get()
                    ->map(function($slot) {
                        return [
                            'time' => date('H:i', strtotime($slot->time)),
                            'available' => true,
                            'is_booked' => false
                        ];
                    });
                
                return response()->json([
                    'success' => true,
                    'time_slots' => $timeSlots
                ]);
            }
            
            // Ambil semua time slots yang aktif dari database
            $allTimeSlots = TimeSlot::where('is_active', 1)
                ->orderBy('time')
                ->get();
            
            // ✅ FIX 3: Gunakan whereDate untuk keamanan lebih baik
            $bookedTimes = Booking::whereDate('tanggal', $date)
                ->whereIn('status', ['Menunggu Pembayaran', 'Dikonfirmasi'])
                ->pluck('waktu')
                ->map(function($time) {
                    return date('H:i', strtotime($time));
                })
                ->toArray();
            
            // Gabungkan data: cek mana yang sudah dibooking
            $timeSlots = $allTimeSlots->map(function($slot) use ($bookedTimes) {
                $timeFormatted = date('H:i', strtotime($slot->time));
                $isBooked = in_array($timeFormatted, $bookedTimes);
                
                return [
                    'time' => $timeFormatted,
                    'available' => !$isBooked,
                    'is_booked' => $isBooked
                ];
            });
            
            return response()->json([
                'success' => true,
                'time_slots' => $timeSlots,
                'booked_count' => count($bookedTimes),
                'date' => $date
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * API - Get Booked Slots Only
     * ✅ FIX 3: Gunakan whereDate
     */
    public function getBookedSlots(Request $request)
    {
        $date = $request->query('date');
        
        $bookedTimes = Booking::whereDate('tanggal', $date)
            ->whereIn('status', ['Menunggu Pembayaran', 'Dikonfirmasi'])
            ->pluck('waktu')
            ->map(function($time) {
                return date('H:i', strtotime($time));
            })
            ->toArray();
        
        return response()->json([
            'success' => true,
            'booked_slots' => $bookedTimes,
            'count' => count($bookedTimes)
        ]);
    }

    /**
     * API - Get Available Slots (Legacy - untuk backward compatibility)
     */
    public function getAvailableSlots(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'package_id' => 'required|exists:packages,id',
        ]);

        $bookedSlots = Booking::whereDate('tanggal', $request->tanggal)
                             ->whereIn('status', ['Menunggu Pembayaran', 'Dikonfirmasi'])
                             ->pluck('waktu')
                             ->map(function($time) {
                                 return date('H:i', strtotime($time));
                             })
                             ->toArray();

        $startHour = 9;
        $endHour = 18;
        $allSlots = [];

        for ($hour = $startHour; $hour < $endHour; $hour++) {
            for ($minute = 0; $minute < 60; $minute += 30) {
                $time = sprintf('%02d:%02d', $hour, $minute);
                $allSlots[] = [
                    'time' => $time,
                    'available' => !in_array($time, $bookedSlots)
                ];
            }
        }

        return response()->json([
            'success' => true,
            'slots' => $allSlots
        ]);
    }

    /**
     * My Bookings - Semua booking user yang login
     */
    public function myBookings()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        
        $user = Auth::user();
        
        if (!$user || !$user->email) {
            return redirect()->route('login')->with('error', 'Data user tidak valid');
        }
        
        $email = $user->email;
        $phone = $user->no_hp ?? null;
        
        $bookings = Booking::query()
            ->where('email', $email)
            ->when($phone, function($q) use ($phone) {
                $q->orWhere('nomor_telepon', $phone);
            })
            ->with('package')
            ->latest()
            ->get();
        
        return view('booking3', compact('bookings'));
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('package')
            ->where(function ($q) {
                $q->where('status_pembayaran', '!=', 'Lunas')
                    ->orWhere('status', '!=', 'Selesai');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.booking.index', compact('bookings'));
    }


    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Dikonfirmasi,Selesai,Batal',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->status = $request->status;
        
        if ($request->catatan) {
            $booking->catatan_admin = $request->catatan;
        }
        
        $booking->save();

        // ✅ Auto-create transaction jika status Selesai dan pembayaran Lunas
        if ($request->status == 'Selesai' && $booking->status_pembayaran == 'Lunas') {
            $this->createTransaction($booking);
        }

        return redirect()->route('admin.booking.index')
            ->with('success', 'Status booking berhasil diupdate menjadi ' . $request->status);
    }

    public function updatePayment(Request $request, $id)
    {
        $request->validate([
            'status_pembayaran' => 'required|string|in:Lunas,Belum Lunas',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->status_pembayaran = $request->status_pembayaran;
        $booking->save();

        // ✅ Auto-create transaction jika pembayaran Lunas dan status Selesai
        if ($request->status_pembayaran == 'Lunas' && $booking->status == 'Selesai') {
            $this->createTransaction($booking);
        }

        return redirect()->route('admin.booking.index')
            ->with('success', 'Status pembayaran berhasil diupdate menjadi: ' . $request->status_pembayaran);
    }

    /**
     * ✅ Helper method untuk create transaction otomatis
     */
    private function createTransaction($booking)
    {
        // Cek apakah transaksi sudah pernah dibuat (prevent duplicate)
        $existingTransaction = Transaction::where('booking_id', $booking->id)->first();
        
        if (!$existingTransaction) {
            Transaction::create([
                'booking_id' => $booking->id,
                'transaction_number' => 'TRX-' . date('Ymd') . '-' . strtoupper(Str::random(6)),
                'email' => $booking->email,
                'phone' => $booking->nomor_telepon,
                'customer_name' => $booking->nama_pelanggan,
                'package_name' => $booking->package->name ?? 'Unknown Package',
                'booking_date' => $booking->tanggal,
                'total_payment' => $booking->total_pembayaran,
                'drive_link' => null,
                'expiry_date' => null,
                'status' => 'pending' // Status pending sampai admin upload drive link
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $booking = Booking::findOrFail($id);
            $kodeBooking = $booking->kode_booking;
            
            // Hapus booking
            $booking->delete();
            
            return redirect()->route('admin.booking.index')
                ->with('success', "Booking {$kodeBooking} berhasil dihapus!");
                
        } catch (\Exception $e) {
            return redirect()->route('admin.booking.index')
                ->with('error', 'Gagal menghapus booking: ' . $e->getMessage());
        }
    }
    
}
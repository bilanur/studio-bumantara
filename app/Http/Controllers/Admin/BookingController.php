<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('package')
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

    return redirect()->route('admin.booking.index')
        ->with('success', 'Status pembayaran berhasil diupdate menjadi: ' . $request->status_pembayaran);
}

}
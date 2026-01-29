<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Carbon\Carbon;
use DB;

class DashboardController extends Controller
{

    public function index()
    {
        // TOTAL SEMUA BOOKING
        $totalBooking = Booking::count();

        // BOOKING BULAN INI
        $bookingBulanIni = Booking::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        // BOOKING HARI INI
        $bookingHariIni = Booking::whereDate('created_at', today())->count();

        // LINE CHART (7 hari terakhir dari laporan)
        $chartLine = Booking::select(
            DB::raw('DATE(tanggal) as tgl'),
            DB::raw('count(*) as total')
        )
            ->where('status', 'Selesai')
            ->where('status_pembayaran', 'Lunas')
            ->whereBetween('tanggal', [
                Carbon::now()->subDays(6),
                Carbon::now()
            ])
            ->groupBy('tgl')
            ->get();

        // DONUT STATUS
        $donut = Booking::select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->get();

        return view('admin.dashboard', compact(
            'totalBooking',
            'bookingBulanIni',
            'bookingHariIni',
            'chartLine',
            'donut'
        ));
    }
}

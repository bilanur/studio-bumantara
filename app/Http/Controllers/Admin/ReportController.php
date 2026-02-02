<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $bulan = $request->bulan ?? now()->format('Y-m');

        $reports = Booking::with('package')
            ->where('status', 'Selesai') // cukup ini
            ->whereRaw("DATE_FORMAT(tanggal,'%Y-%m') = ?", [$bulan])
            ->orderBy('tanggal', 'desc')
            ->get();

        $total = $reports->sum('total_pembayaran');

        return view('admin.report.index', compact('reports', 'bulan', 'total'));
    }
}

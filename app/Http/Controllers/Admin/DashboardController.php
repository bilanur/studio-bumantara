<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalBooking' => 180,
            'jadwalHariIni' => 180,
            'bookingTerbaru' => 180,
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = [
            [
                'kode' => 'BK001',
                'nama' => 'Andi Pratama',
                'paket' => 'Prewedding',
                'tanggal' => '2026-01-05',
                'jam' => '10:00 - 11:00',
                'status' => 'Selesai'
            ],
            [
                'kode' => 'BK002',
                'nama' => 'Siti Rahma',
                'paket' => 'Wisuda',
                'tanggal' => '2026-01-06',
                'jam' => '13:00 - 14:00',
                'status' => 'Diproses'
            ],
            [
                'kode' => 'BK003',
                'nama' => 'Budi Santoso',
                'paket' => 'Keluarga',
                'tanggal' => '2026-01-07',
                'jam' => '15:00 - 16:00',
                'status' => 'Batal'
            ],
        ];

        return view('admin.booking.index', compact('bookings'));
    }
}

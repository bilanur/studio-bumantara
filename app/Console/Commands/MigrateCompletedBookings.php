<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Booking;
use App\Models\Transaction;
use Illuminate\Support\Str;

class MigrateCompletedBookings extends Command
{
    protected $signature = 'bookings:migrate-completed';
    protected $description = 'Migrate completed and paid bookings to transactions table';

    public function handle()
    {
        $this->info('🔄 Memulai migrasi data booking...');

        $completedBookings = Booking::where('status', 'Selesai')
            ->where('status_pembayaran', 'Lunas')
            ->whereDoesntHave('transaction')
            ->get();

        if ($completedBookings->isEmpty()) {
            $this->warn('⚠️  Tidak ada booking yang perlu dimigrasi.');
            return;
        }

        $this->info("📦 Ditemukan {$completedBookings->count()} booking yang akan dimigrasi...");
        
        $bar = $this->output->createProgressBar($completedBookings->count());
        $bar->start();

        foreach ($completedBookings as $booking) {
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
                'status' => 'pending'
            ]);

            $bar->advance();
        }

        $bar->finish();
        $this->newLine(2);
        $this->info("✅ Berhasil migrasi {$completedBookings->count()} bookings ke tabel transactions!");
    }
}
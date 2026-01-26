<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            
            $table->string('kode_booking', 20)->unique();
            
            // RELASI KE PACKAGES
            $table->foreignId('package_id')
                  ->constrained()
                  ->cascadeOnDelete();
            
            // DATA CUSTOMER
            $table->string('nama_pelanggan');
            $table->string('nomor_telepon', 20);
            $table->string('email');
            
            // DETAIL BOOKING
            $table->date('tanggal');
            $table->time('waktu');
            $table->string('zona_waktu', 10)->default('WIB');
            $table->string('durasi', 50);
            
            // HARGA
            $table->integer('extra_people')->default(0);
            $table->integer('harga_paket');
            $table->integer('harga_extra_people')->default(0);
            $table->integer('total_pembayaran');
            
            // PEMBAYARAN
            $table->string('metode_pembayaran');
            $table->enum('status', [
                'Menunggu Pembayaran',
                'Dikonfirmasi',
                'Selesai',
                'Batal',
                'Expired'
            ])->default('Menunggu Pembayaran');
            
            // TAMBAHAN
            $table->string('izin_sosmed', 50)->nullable();
            $table->text('catatan')->nullable();
            
            $table->timestamps();
            
            // INDEX untuk performa
            $table->index('tanggal');
            $table->index('status');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
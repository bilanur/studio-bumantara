<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_booking',
        'package_id',
        'nama_pelanggan',
        'nomor_telepon',
        'email',
        'tanggal',
        'waktu',
        'zona_waktu',
        'durasi',
        'extra_people',
        'harga_paket',
        'harga_extra_people',
        'total_pembayaran',
        'metode_pembayaran',
        'status',
        'izin_sosmed',
        'catatan',
        'promo_code',
        'discount',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'waktu' => 'datetime:H:i',
        'extra_people' => 'integer',
        'harga_paket' => 'integer',
        'harga_extra_people' => 'integer',
        'total_pembayaran' => 'integer',
    ];

    /**
     * Relasi ke Package
     */
    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    /**
     * Generate kode booking unik
     */
    public static function generateKodeBooking()
    {
        $prefix = 'BKG';
        $date = now()->format('ymd'); // 250122
        $random = strtoupper(substr(md5(uniqid(rand(), true)), 0, 4)); // 4 karakter random
        
        $kode = $prefix . $date . $random; // BKG250122A1B2
        
        // Cek jika sudah ada, generate ulang
        while (self::where('kode_booking', $kode)->exists()) {
            $random = strtoupper(substr(md5(uniqid(rand(), true)), 0, 4));
            $kode = $prefix . $date . $random;
        }
        
        return $kode;
    }

    /**
     * Format total pembayaran ke Rupiah
     */
    public function getFormattedTotalAttribute()
    {
        return 'Rp ' . number_format($this->total_pembayaran, 0, ',', '.');
    }

    /**
     * Get status badge color
     */
    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'Menunggu Pembayaran' => 'warning',
            'Dikonfirmasi' => 'info',
            'Selesai' => 'success',
            'Batal' => 'danger',
            'Expired' => 'secondary',
            default => 'secondary',
        };
    }

    /**
     * Scope untuk filter berdasarkan status
     */
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Scope untuk booking hari ini
     */
    public function scopeToday($query)
    {
        return $query->whereDate('tanggal', today());
    }

    /**
     * Scope untuk booking mendatang
     */
    public function scopeUpcoming($query)
    {
        return $query->where('tanggal', '>=', today())
                     ->orderBy('tanggal', 'asc')
                     ->orderBy('waktu', 'asc');
    }

    /**
     * Check apakah booking sudah expired (lewat 24 jam dan belum bayar)
     */
    public function checkExpired()
    {
        if ($this->status === 'Menunggu Pembayaran' && $this->created_at->addHours(24) < now()) {
            $this->update(['status' => 'Expired']);
            return true;
        }
        return false;
    }

    /**
     * Get tanggal & waktu format Indonesia
     */
    public function getFormattedScheduleAttribute()
    {
        $days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        $months = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        
        $dayName = $days[$this->tanggal->dayOfWeek];
        $day = $this->tanggal->day;
        $month = $months[$this->tanggal->month];
        $year = $this->tanggal->year;
        $time = $this->waktu->format('H:i');
        
        return "$dayName, $day $month $year | $time {$this->zona_waktu}";
    }

    // Tambahkan di dalam class Booking
public function transaction()
{
    return $this->hasOne(Transaction::class);
}

}
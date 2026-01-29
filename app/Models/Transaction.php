<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'transaction_number',
        'email',
        'phone',
        'customer_name',
        'package_name',
        'booking_date',
        'total_payment',
        'drive_link',
        'expiry_date',
        'status'
    ];

    protected $casts = [
        'booking_date' => 'date',
        'expiry_date' => 'date',
    ];

    // Relasi ke booking
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    // Helper methods (yang sebelumnya)
    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->total_payment, 0, ',', '.');
    }

    public function getFormattedBookingDateAttribute()
    {
        $months = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
        ];
        
        return $this->booking_date->format('d') . ' ' . 
               $months[$this->booking_date->format('n')] . ' ' . 
               $this->booking_date->format('Y');
    }

    public function getFormattedExpiryDateAttribute()
    {
        if (!$this->expiry_date) return '-';
        
        $months = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
        ];
        
        return $this->expiry_date->format('d') . ' ' . 
               $months[$this->expiry_date->format('n')] . ' ' . 
               $this->expiry_date->format('Y');
    }

    public function getStatusBadgeAttribute()
    {
        return match($this->status) {
            'completed' => 'status-success',
            'pending' => 'status-pending',
            'cancelled' => 'status-cancelled',
            default => 'status-pending'
        };
    }

    public function getStatusTextAttribute()
    {
        return match($this->status) {
            'completed' => 'Selesai',
            'pending' => 'Menunggu',
            'cancelled' => 'Dibatalkan',
            default => 'Menunggu'
        };
    }
}
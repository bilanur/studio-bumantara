<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'duration',
        'price',
        'max_people',
        'image'
    ];

    protected $casts = [
        'duration' => 'integer',
        'price' => 'integer',
        'max_people' => 'integer',
    ];

    /**
     * Relasi ke Booking
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * Format harga ke Rupiah
     */
    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }

    /**
     * Get description sebagai array
     */
    public function getDescriptionArrayAttribute()
    {
        return explode("\n", $this->description);
    }
}
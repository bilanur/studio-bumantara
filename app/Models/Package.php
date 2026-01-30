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
        'image',
        'theme_count',
        'print_count',
        'edited_count',
        'has_gdrive'
    ];

    protected $casts = [
        'duration' => 'integer',
        'price' => 'integer',
        'max_people' => 'integer',
        'theme_count' => 'integer',
        'print_count' => 'integer',
        'edited_count' => 'integer',
        'has_gdrive' => 'boolean',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }

    public function getDescriptionArrayAttribute()
    {
        return explode("\n", $this->description);
    }

    /**
     * Get fitur yang tersedia
     */
    public function getAvailableFeaturesAttribute()
    {
        $features = [];
        
        if ($this->theme_count) $features[] = $this->theme_count . ' Tema';
        if ($this->print_count) $features[] = 'Cetak ' . $this->print_count . ' Foto';
        if ($this->edited_count) $features[] = $this->edited_count . ' Edited File';
        if ($this->has_gdrive) $features[] = 'All File by G.Drive';
        
        return $features;
    }
}
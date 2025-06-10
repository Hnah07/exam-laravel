<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'title',
        'region',
        'start_date',
        'duration_days',
        'price_per_person',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}

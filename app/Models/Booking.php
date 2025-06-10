<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    /** @use HasFactory<\Database\Factories\BookingFactory> */
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'trip_id',
        'name',
        'email',
        'number_of_people',
        'status',
        'token',
    ];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
}

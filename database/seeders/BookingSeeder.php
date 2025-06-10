<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Trip;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trips = Trip::all();

        $statuses = ['pending', 'confirmed', 'cancelled'];
        foreach ($statuses as $status) {
            Booking::factory()->create([
                'trip_id' => $trips->random()->id,
                'status' => $status,
            ]);
        }

        Booking::factory(5)->create([
            'trip_id' => fn() => $trips->random()->id,
        ]);
    }
}

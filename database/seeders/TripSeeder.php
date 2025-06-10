<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Trip;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Trip::create([
            'title' => 'Off-Grid Camping in Jasper',
            'region' => 'west',
            'start_date' => '2025-07-01',
            'duration_days' => 6,
            'price_per_person' => 1234.56,
        ]);
        $regions = ['west', 'east', 'north', 'central'];
        foreach ($regions as $region) {
            Trip::factory()->create([
                'region' => $region,
            ]);
        }

        Trip::factory(1)->create();
    }
}

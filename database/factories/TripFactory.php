<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trip>
 */
class TripFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'region' => fake()->randomElement(['west', 'east', 'north', 'central']),
            'start_date' => fake()->dateTimeBetween('+1 month', '+1 year')->format('Y-m-d'),
            'duration_days' => fake()->numberBetween(1, 10),
            'price_per_person' => fake()->randomFloat(2, 100, 1000),
        ];
    }
}

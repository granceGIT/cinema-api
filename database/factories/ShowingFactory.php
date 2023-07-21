<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Showing>
 */
class ShowingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $priceRange = range(200,270,10);

        return [
            'film_id' => rand(1,10),
            'date' => now()->addDays(rand(0,3))->format('Y-m-d'),
            'base_price' => $priceRange[array_rand($priceRange)],
            'hall_id' => rand(1,4),
            'start_time' => rand(0,23) . ":" . rand(0,59),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

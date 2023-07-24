<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Film>
 */
class FilmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Не работает русская локализация неизвестно по какой причине. TODO: поискать варианты
        $faker = \Faker\Factory::create("ru_RU");

        return [
            'name'=>$faker->words(2,true),
            'description'=>$faker->paragraph(2),
            'country_id' => rand(1,6),
            'release_date' => rand(1990,2023),
            'director_id' => rand(1,5),
            'age_restriction_id' => rand(1,5),
            'duration' => rand(60,180),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

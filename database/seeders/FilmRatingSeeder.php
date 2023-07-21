<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmRatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filmRatings = [];
        for ($i = 1; $i < 10; $i++) {
            for ($j = 1; $j <= 2; $j++) {
                $filmRatings[] = [
                    'user_id' => $j,
                    'film_id' => $i,
                    'rate' => rand(4,9),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('film_rating')->insert($filmRatings);
    }
}

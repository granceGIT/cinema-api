<?php

namespace Database\Seeders;

use App\Models\Seat;
use Database\Factories\SeatFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            StatusSeeder::class,
            GenreSeeder::class,
            HallSeeder::class,
            RoleSeeder::class,
            SeatTypeSeeder::class,
            UserSeeder::class,
            ActorSeeder::class,
            CountrySeeder::class,
            DirectorSeeder::class,
            AgeRestrictionSeeder::class,
            FilmSeeder::class,
            ShowingSeeder::class,
            SeatSeeder::class,
            ActorFilmSeeder::class,
            FilmGenreSeeder::class,
            FilmRatingSeeder::class,
            ImageSeeder::class,
        ]);

    }
}

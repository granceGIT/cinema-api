<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            TicketTypeSeeder::class,
            SeatTypeSeeder::class,
            UserSeeder::class,
            ActorSeeder::class,
            CountrySeeder::class,
            DirectorSeeder::class,
            AgeRestrictionSeeder::class,
            FilmSeeder::class,
            ShowingSeeder::class,
            SeatSeeder::class,
        ]);

    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('film_genre')->insert([
            [
                'film_id'=>1,
                'genre_id'=>2,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'film_id'=>1,
                'genre_id'=>7,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'film_id'=>2,
                'genre_id'=>2,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'film_id'=>2,
                'genre_id'=>3,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'film_id'=>2,
                'genre_id'=>5,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);
    }
}

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
        DB::table('film_rating')->insert([
            [
                'user_id'=>1,
                'film_id'=>1,
                'rate'=>5,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'user_id'=>2,
                'film_id'=>1,
                'rate'=>8,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'user_id'=>1,
                'film_id'=>2,
                'rate'=>9,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);
    }
}

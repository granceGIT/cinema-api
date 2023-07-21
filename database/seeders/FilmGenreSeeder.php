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
        $filmGenres = [];
        for ($i=1;$i<=10;$i++){
            for($j=0;$j<2;$j++){
                $filmGenres[] = [
                    'film_id'=>$i,
                    'genre_id'=>rand(1,8),
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ];
            }
        }

        DB::table('film_genre')->insert($filmGenres);
    }
}

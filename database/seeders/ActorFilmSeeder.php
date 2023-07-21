<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActorFilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create("ru_RU");

        $filmActors = [];
        for ($i=1;$i<=10;$i++){
            for ($j=0;$j<3;$j++){
                $filmActors[]=[
                    'role'=>$faker->words(2,true),
                    'actor_id'=>rand(1,6),
                    'film_id'=>$i,
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ];
            }
        }

        DB::table('actor_film')->insert($filmActors);
    }
}

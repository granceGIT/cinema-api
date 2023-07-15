<?php

namespace Database\Seeders;

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
        DB::table('actor_film')->insert([
            [
                'role'=>'Имя фамилия',
                'actor_id'=>1,
                'film_id'=>1,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'role'=>'Злодей',
                'actor_id'=>2,
                'film_id'=>1,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'role'=>'Герой',
                'actor_id'=>5,
                'film_id'=>2,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'role'=>'Добряк',
                'actor_id'=>3,
                'film_id'=>2,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);
    }
}

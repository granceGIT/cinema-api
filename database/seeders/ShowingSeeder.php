<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShowingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('showings')->insert([
            [
                'film_id' => 1,
                'date' => '2023-10-10',
                'base_price' => 200,
                'hall_id' => 1,
                'start_time' => '20:00',
                'end_time' => '22:35',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'film_id' => 2,
                'date' => '2023-11-11',
                'base_price' => 200,
                'hall_id' => 2,
                'start_time' => '12:00',
                'end_time' => '14:28',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeatTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('seat_types')->insert([
            [
                'name'=>'Стандарт',
            ],
            [
                'name'=>'Эконом',
                'price_ratio'=>0.9
            ],
        ]);
    }
}

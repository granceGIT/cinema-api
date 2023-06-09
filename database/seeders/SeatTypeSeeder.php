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
                'price_ratio'=>1,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>'Эконом',
                'price_ratio'=>0.9,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);
    }
}

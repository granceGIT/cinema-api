<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('halls')->insert([
            [
                'name' => 'Зал №1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Зал №2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Зал №3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Зал №4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

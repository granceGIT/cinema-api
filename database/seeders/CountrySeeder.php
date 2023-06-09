<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('countries')->insert([
            [
                'name' => 'Россия',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'США',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Германия',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Франция',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Великобритания',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Испания',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

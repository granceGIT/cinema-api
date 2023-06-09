<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgeRestrictionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('age_restrictions')->insert([
            [
                'age' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'age' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'age' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'age' => 16,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'age' => 18,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

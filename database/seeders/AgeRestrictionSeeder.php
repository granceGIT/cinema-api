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
                'age'=>0,
            ],
            [
                'age'=>6,
            ],
            [
                'age'=>12,
            ],
            [
                'age'=>16,
            ],
            [
                'age'=>18,
            ],
        ]);
    }
}

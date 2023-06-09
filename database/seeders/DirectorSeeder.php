<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DirectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('directors')->insert([
            [
                'name' => 'Кристофер',
                'surname' => 'Нолан',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Джеймс',
                'surname' => 'Кэмерон',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Дэвид',
                'surname' => 'Йетс',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Рон',
                'surname' => 'Ховард',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Джордж',
                'surname' => 'Лукас',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('genres')->insert([
            [
                'name' => 'Триллер',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Драма',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Криминал',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Комедия',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Приключения',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Фентези',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Фантастика',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Семейный',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('statuses')->insert([
            [
                'name' => 'Новый',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Оплачен',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Отменен',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

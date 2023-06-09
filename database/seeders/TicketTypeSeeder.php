<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ticket_types')->insert([
            [
                'name'=>'Взрослый',
                'price_ratio'=>1,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>'Детский',
                'price_ratio'=>0.9,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);
    }
}

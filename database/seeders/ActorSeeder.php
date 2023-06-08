<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('actors')->insert([
            [
                'name'=>'Мэттью',
                'surname'=>'МакКонахи',
                'gender'=>'м',
            ],
            [
                'name'=>'Киллиан',
                'surname'=>'Мерфи',
                'gender'=>'м',
            ],
            [
                'name'=>'Райан',
                'surname'=>'Гослинг',
                'gender'=>'м',
            ],
            [
                'name'=>'Кристиан',
                'surname'=>'Бэйл',
                'gender'=>'м',
            ],
            [
                'name'=>'Ана',
                'surname'=>'де Армас',
                'gender'=>'ж',
            ],
            [
                'name'=>'Кэри',
                'surname'=>'Маллиган',
                'gender'=>'ж',
            ],
        ]);
    }
}

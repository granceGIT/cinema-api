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
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>'Киллиан',
                'surname'=>'Мерфи',
                'gender'=>'м',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>'Райан',
                'surname'=>'Гослинг',
                'gender'=>'м',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>'Кристиан',
                'surname'=>'Бэйл',
                'gender'=>'м',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>'Ана',
                'surname'=>'де Армас',
                'gender'=>'ж',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>'Кэри',
                'surname'=>'Маллиган',
                'gender'=>'ж',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);
    }
}

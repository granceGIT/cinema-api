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
                'name'=>'Кристофер',
                'surname'=>'Нолан',
            ],
            [
                'name'=>'Джеймс',
                'surname'=>'Кэмерон',
            ],
            [
                'name'=>'Дэвид',
                'surname'=>'Йетс',
            ],
            [
                'name'=>'Рон',
                'surname'=>'Ховард',
            ],
            [
                'name'=>'Джордж',
                'surname'=>'Лукас',
            ],
        ]);
    }
}

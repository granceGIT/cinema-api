<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('films')->insert([
            [
                'name' => 'Интерстеллар',
                'description' => 'Наше время на Земле подошло к концу, команда исследователей берет на себя самую важную миссию в истории человечества; путешествуя за пределами нашей галактики, чтобы узнать есть ли у человечества будущее среди звезд.',
                'country_id' => 2,
                'release_date' => 2014,
                'director_id' => 1,
                'age_restriction_id' => 3,
                'duration' => 155,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Начало',
                'description' => 'Кобб — талантливый вор, лучший из лучших в опасном искусстве извлечения: он крадет ценные секреты из глубин подсознания во время сна, когда человеческий разум наиболее уязвим. ',
                'country_id' => 4,
                'release_date' => 2010,
                'director_id' => 1,
                'age_restriction_id' => 4,
                'duration' => 148,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movieImages = [
            'https://images.unsplash.com/photo-1603008211659-dfa24ae98e15',
            'https://images.unsplash.com/photo-1672415854410-373fd032d0b3',
            'https://images.unsplash.com/photo-1668113398361-4690e3381149',
            'https://images.unsplash.com/photo-1574641264510-d656942d6380',
            'https://images.unsplash.com/photo-1685297269362-e604510647ef',
            'https://images.unsplash.com/photo-1689581370827-f8aeb01a1d2d',
            'https://images.unsplash.com/photo-1687254426928-f172a8328240',
            'https://images.unsplash.com/photo-1571419217025-45401025b557',
            'https://images.unsplash.com/photo-1687254524073-a2093206a1d9',
            'https://images.unsplash.com/photo-1638192248146-162fc0a6026a',
            'https://images.unsplash.com/photo-1671270305296-3072cfdb4563',
            'https://images.unsplash.com/photo-1639739945221-e025c158286f',
            'https://images.unsplash.com/photo-1689753951860-6af6019d2b48',
            'https://images.unsplash.com/photo-1675326171126-bee0d33d9198',
            'https://images.unsplash.com/photo-1684755343416-f402793a7d23',
            'https://images.unsplash.com/photo-1685478348267-62f31498477b',
            'https://images.unsplash.com/photo-1685345324387-288cd60ce288',
            'https://images.unsplash.com/photo-1681896932291-0cb10be3da0f',
            'https://images.unsplash.com/photo-1683826368144-563a0ec00ea9',
            'https://images.unsplash.com/photo-1681459798045-de729f4e59b4',
            'https://images.unsplash.com/photo-1611419010196-a360856fc42f',
            'https://images.unsplash.com/photo-1677330889088-829a4f1699a3',
            'https://images.unsplash.com/photo-1517116193902-bd0889c5edef',
            'https://images.unsplash.com/photo-1670427625049-6f1e8ef77e2b',
        ];

        $images = [];
        for ($i = 1; $i <= 10; $i++) {
            for ($j = 0; $j < 5; $j++) {
                $images[] = [
                    'imageable_type' => 'App\Models\Film',
                    'imageable_id' => $i,
                    'image' => $movieImages[array_rand($movieImages)],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Hall images
        DB::table('images')->insert([
            [
                'imageable_type' => 'App\Models\Hall',
                'imageable_id' => 1,
                'image' => 'https://images.unsplash.com/photo-1489599849927-2ee91cede3ba',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'imageable_type' => 'App\Models\Hall',
                'imageable_id' => 2,
                'image' => 'https://images.unsplash.com/photo-1524712245354-2c4e5e7121c0',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'imageable_type' => 'App\Models\Hall',
                'imageable_id' => 3,
                'image' => 'https://images.unsplash.com/photo-1583482183021-daf2141fc406',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'imageable_type' => 'App\Models\Hall',
                'imageable_id' => 4,
                'image' => 'https://images.unsplash.com/photo-1680479610863-13c6224a78d0',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Movie images
        DB::table('images')->insert($images);
    }
}

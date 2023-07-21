<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'user',
                'phone_number' => '+79000000000',
                'password' => Hash::make('password'),
                'role_id' => 1,
                'api_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'user2',
                'phone_number' => '+79000000001',
                'password' => Hash::make('password'),
                'role_id' => 1,
                'api_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'user3',
                'phone_number' => '+79000000002',
                'password' => Hash::make('password'),
                'role_id' => 1,
                'api_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'admin',
                'phone_number' => '+79999999999',
                'password' => Hash::make('password'),
                'role_id' => 2,
                'api_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

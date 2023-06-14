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
                'phone_number' => '89000000000',
                'password' => 'password',
                'password_hashed' => Hash::make('password'),
                'role_id' => 1,
                'api_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'admin',
                'phone_number' => '89999999999',
                'password' => 'password',
                'password_hashed' => Hash::make('password'),
                'role_id' => 2,
                'api_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

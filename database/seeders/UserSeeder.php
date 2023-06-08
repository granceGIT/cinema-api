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
                'name'=>'user',
                'phone'=>'89000000000',
                'password'=>Hash::make('password'),
            ],
            [
                'name'=>'admin',
                'phone'=>'89999999999',
                'password'=>Hash::make('password'),
                'role_id'=>2,
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Users_infoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_info')->insert([
            [
                'Username' => 'joh_doe',
                'Name' => 'John Doe',
                'Contact' => '1234567890',
                'Password' => Hash::make('password123'), // Always hash passwords
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Username' => 'jan_smith',
                'Name' => 'Jane Smith',
                'Contact' => '0987654321',
                'Password' => Hash::make('securepass'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
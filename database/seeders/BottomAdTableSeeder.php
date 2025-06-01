<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BottomAdTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Inserting dummy data into the 'bottom_ad' table
        DB::table('bottom_ad')->insert([
            [
                'File_Path' => 'path/to/ad1.jpg',
                'is_top' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'File_Path' => 'path/to/ad2.jpg',
                'is_top' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'File_Path' => 'path/to/ad3.jpg',
                'is_top' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

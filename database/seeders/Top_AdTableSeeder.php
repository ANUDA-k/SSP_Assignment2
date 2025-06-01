<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Top_AdTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('top_ad')->insert([
            [
                'File_Path' => 'ads/banner1.jpg',
                'is_top' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'File_Path' => 'ads/banner2.jpg',
                'is_top' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

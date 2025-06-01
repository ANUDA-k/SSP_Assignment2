<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('agencies')->insert([
            [
                'Agency_Name' => 'Skyline Properties',
                'Description' => 'A leading real estate agency specializing in luxury apartments.',
                'Documents' => 'license_skyline.pdf',
                'Image' => 'skyline.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Agency_Name' => 'Metro Homes',
                'Description' => 'Affordable homes and commercial properties across the metro.',
                'Documents' => 'license_metro.pdf',
                'Image' => 'metro.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Agency_Name' => 'Green Valley Estates',
                'Description' => 'Eco-friendly property development and management.',
                'Documents' => 'license_greenvalley.pdf',
                'Image' => 'greenvalley.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

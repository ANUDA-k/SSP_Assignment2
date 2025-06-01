<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rent')->insert([
            [
                'topic' => '2 BHK Apartment for Rent',
                'rooms' => '2',
                'bathrooms' => '2',
                'price' => '1200',
                'description' => 'Spacious 2 BHK with good ventilation and near public transport.',
                'contact' => '111-222-3333',
                'email' => 'rentagent1@example.com',
                'property_type' => 'APT',
                'images' => 'rent1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'topic' => 'Cozy Studio in City Center',
                'rooms' => '1',
                'bathrooms' => '1',
                'price' => '800',
                'description' => 'Perfect for singles or students. All amenities included.',
                'contact' => '444-555-6666',
                'email' => 'rentagent2@example.com',
                'property_type' => 'STD',
                'images' => 'rent2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
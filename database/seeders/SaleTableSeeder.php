<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SaleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sale')->insert([
            [
                'topic' => 'Luxury Villa in Beverly Hills',
                'rooms' => '5',
                'bathrooms' => '4',
                'price' => '2500000',
                'description' => 'A luxurious villa with a swimming pool and large garden.',
                'contact' => '123-456-7890',
                'email' => 'agent1@example.com',
                'property_type' => 'VLL',
                'images' => 'villa1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'topic' => 'Downtown Apartment',
                'rooms' => '2',
                'bathrooms' => '1',
                'price' => '400000',
                'description' => 'Modern apartment located in the heart of the city.',
                'contact' => '987-654-3210',
                'email' => 'agent2@example.com',
                'property_type' => 'APT',
                'images' => 'apt1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

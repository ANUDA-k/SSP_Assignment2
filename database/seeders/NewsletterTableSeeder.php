<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsletterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Inserting dummy data into the 'newsletter' table
        DB::table('newsletter')->insert([
            [
                'email' => 'user1@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'user2@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'user3@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

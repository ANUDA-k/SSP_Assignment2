<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call custom seeders
        $this->call([
            Users_infoTableSeeder::class,
            Top_AdTableSeeder::class,
            SaleTableSeeder::class,
            RentTableSeeder::class,
            NewsletterTableSeeder::class,
            BottomAdTableSeeder::class,
            AgenciesTableSeeder::class, // <-- Add this line
        ]);

        // Example user
       
    }
}
<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         // Disable foreign key checks to speed up the process
         DB::statement('SET FOREIGN_KEY_CHECKS=0');

         // Adjust the maximum execution time (optional)
         set_time_limit(0);
 
         // Call your user seeder with the desired number of users (e.g., 1,000,000)
         $this->call(UserSeeder::class);
 
         // Enable foreign key checks again
         DB::statement('SET FOREIGN_KEY_CHECKS=1');
         
        

    }
}

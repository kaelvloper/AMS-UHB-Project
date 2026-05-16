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
        // Create Default Admin
        User::factory()->create([
            'name' => 'Admin AMS',
            'email' => 'admin@ams.com',
            'password' => bcrypt('password'),
        ]);

        // Run KJM Seeder
        $this->call([
            KjmSeeder::class,
        ]);
    }
}

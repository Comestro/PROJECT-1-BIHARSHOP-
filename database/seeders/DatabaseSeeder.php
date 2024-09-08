<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;  // Import the Category model (if needed)

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
{
    // Seed Users
    User::factory(10)->create();

    // Check if the test user exists before creating it
    if (!User::where('email', 'test@example.com')->exists()) {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }

    // Seed Categories
    $this->call(CategorySeeder::class);

        // Seed Products
    $this->call(ProductSeeder::class);

}
    
}

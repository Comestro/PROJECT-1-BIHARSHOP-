<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;  
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

        // Seed Address
        $this->call(AddressSeeder::class);


        // Seed Coupon
        $this->call(CouponSeeder::class);
        
         // Seed ProductVariationSeeder
         $this->call(ProductVariationSeeder::class);

         // Seed OptionValueSeeder
         $this->call(OptionValueSeeder::class);

         // Seed OrderSeeder
         $this->call(OrderSeeder::class);

         // Seed OrderItemSeeder
         $this->call(OrderItemSeeder::class);

          // Seed VariationOptionSeeder
          $this->call(VariationOptionSeeder::class);

           // Seed ProductImageSeeder
           $this->call(ProductImageSeeder::class);
}
    



}

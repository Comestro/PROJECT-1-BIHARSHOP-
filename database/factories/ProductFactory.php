<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category; // Import Category model

use Illuminate\Database\Eloquent\Factories\Factory;
// use Illuminate\Support\Str;


// /**
//  * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
//  */
// class ProductFactory extends Factory
// {
    
//     protected $model=Product::class;
//     public function definition(): array
//     {
//         return [
//             'name' => $this->faker->word,  // Random product name
//             'slug' => Str::slug($this->faker->unique()->word),  // Unique slug
//             'description' => $this->faker->paragraph,  // Random description
//             'price' => $this->faker->randomFloat(2, 10, 1000),  // Price between 10 and 1000
//             'discount_price' => $this->faker->optional()->randomFloat(2, 5, 900),  // Optional discount price
//             'quantity' => $this->faker->numberBetween(1, 100),  // Random quantity between 1 and 100
//             'sku' => $this->faker->unique()->ean8,  // Random SKU (Unique)
//             'image' => $this->faker->imageUrl(640, 480, 'products', true),  // Random image URL
//             'category_id' => Category::factory(),  // Randomly assign category via factory
//             'brand' => $this->faker->company,  // Random brand
//             'status' => $this->faker->boolean, 
//         ];
//     }
// }


use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    protected $model = \App\Models\Product::class;

    public function definition()
    {
        $name = $this->faker->unique()->word;

        return [
            'name' => $name,
            'slug' => Str::slug($name) . '-' . $this->faker->unique()->numberBetween(1000, 9999),
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 10, 500),
            'discount_price' => $this->faker->randomFloat(2, 5, 450),
            'quantity' => $this->faker->numberBetween(1, 100),
            'sku' => $this->faker->unique()->numberBetween(10000000, 99999999),
            'image' => $this->faker->imageUrl(640, 480, 'products'),
            'category_id' => \App\Models\Category::factory(),
            'brand' => $this->faker->company,
            'status' => $this->faker->boolean,         ];
    }
}

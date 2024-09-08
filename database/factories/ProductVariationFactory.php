<?php

namespace Database\Factories;
use App\Models\ProductVariation;
use App\Models\Product;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductVariation>
 */
class ProductVariationFactory extends Factory
{
   
    protected $model = ProductVariation::class;

    public function definition(): array
    {
        return [
            'product_id' => Product::factory(), 
            'sku' => strtoupper(Str::random(10)), 
            'color' => $this->faker->optional()->colorName(), 
            'size' => $this->faker->optional()->randomElement(['S', 'M', 'L', 'XL']), 
            'price' => $this->faker->randomFloat(2, 10, 1000), 
            'stock' => $this->faker->numberBetween(1, 100), 
        ];
    }
}

<?php

namespace Database\Factories;
use App\Models\ProductImage;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductImageFactory extends Factory
{
    protected $model = ProductImage::class;

    public function definition(): array
    {
        return [
            'product_id' => Product::factory(), // Automatically create a related Product
            'image_path' => $this->faker->imageUrl(), 
        ];
    }
}

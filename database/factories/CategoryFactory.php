<?php

namespace Database\Factories;
use App\Models\Category;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Category::class;

    public function definition(): array
    {
        
        return [
            //
            'parent_category_id' => null, // Or you can customize logic to create child categories
            'name' => $this->faker->word,
            'image' => $this->faker->imageUrl(640, 480, 'categories', true), // Random image
            'cat_description' => $this->faker->paragraph(3), // Random long text
            'cat_slug' => $this->faker->sentence(3),
            'status' => $this->faker->boolean, // Random true/false
        ];
    }
}

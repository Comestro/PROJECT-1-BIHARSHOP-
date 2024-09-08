<?php

namespace Database\Factories;

use App\Models\VariationOption;
use Illuminate\Database\Eloquent\Factories\Factory;

class VariationOptionFactory extends Factory
{
    protected $model = VariationOption::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word(),  // Ensure names are unique
        ];
    }
}

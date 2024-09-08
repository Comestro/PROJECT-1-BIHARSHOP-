<?php

namespace Database\Factories;
use App\Models\OptionValue;
use App\Models\VariationOption;
use Illuminate\Database\Eloquent\Factories\Factory;

class OptionValueFactory extends Factory
{
    protected $model = OptionValue::class;

    public function definition(): array
    {
        return [
            'variation_option_id' => VariationOption::factory(), // Assuming you also have a factory for VariationOption
            'value' => $this->faker->word(),
        ];
    }
}

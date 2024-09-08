<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 2, // Or you can customize logic to create child categories
            'landmark' => $this->faker->word(5),
            'street' => $this->faker->word(10),
            'area' => $this->faker->word(5),
            'city' => $this->faker->word(5),
            'state' => $this->faker->word(5),
            'postal_code' => $this->faker->randomNumber,
            'country' => $this->faker->sentence(3),
            'status' => $this->faker->boolean, // Random true/false
        ];
    }
}

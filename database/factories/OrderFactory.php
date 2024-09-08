<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'order_number' => $this->faker->unique()->numerify('ORD-#####'),
            'status' => $this->faker->randomElement(['pending', 'processing', 'completed', 'canceled']),
            'total_amount' => $this->faker->randomFloat(2, 50, 1000),
            'shipping_charge' => $this->faker->randomFloat(2, 5, 100),
            'payment_status' => $this->faker->randomElement(['paid', 'unpaid', 'refunded']),
            'payment_method' => $this->faker->word(),
            'tracking_number' => $this->faker->optional()->word(),
            'coupon_code' => $this->faker->optional()->word(),
        ];
    }
}

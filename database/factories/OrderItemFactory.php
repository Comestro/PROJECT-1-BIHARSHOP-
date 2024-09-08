<?php

namespace Database\Factories;
use App\Models\Order;
use App\Models\ProductVariation;
use App\Models\OrderItem;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderItemFactory extends Factory
{
    protected $model = OrderItem::class;

    public function definition(): array
    {
        return [
            'order_id' => Order::factory(),
            'product_variation_id' => ProductVariation::factory(),
            'quantity' => $this->faker->numberBetween(1, 10), // Example quantity
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

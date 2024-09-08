<?php

namespace Database\Factories;

use App\Models\Coupon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CouponFactory extends Factory
{
    protected $model = Coupon::class;

    public function definition()
    {
        return [
            'code' => strtoupper(Str::random(10)), 
            'discount_type' => $this->faker->randomElement(['percentage', 'fixed']),
            'discount_price' => $this->faker->randomFloat(2, 5, 100), 
            'expiration_date' => $this->faker->optional()->dateTimeBetween('now', '+1 year'), 
            'status' => $this->faker->boolean(80), 
        ];
    }
}

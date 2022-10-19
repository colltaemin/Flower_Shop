<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'customer_id' => $this->faker->numberBetween(1, 10),
            'name' => $this->faker->name,
            'address' => $this->faker->address,
            'district' => $this->faker->city,
            'province' => $this->faker->state,
            'phone' => $this->faker->phoneNumber,
            'note' => $this->faker->text,
            'message' => $this->faker->text,
            'shipped_at' => $this->faker->dateTime,
            'paid_at' => 'Thanh toán khi nhận hàng',
            'status' => 'pending',
            'total' => $this->faker->numberBetween(100000, 1000000),
            'created_at' => $this->faker->dateTimeBetween('-100 month', 'now'),
        ];
    }
}

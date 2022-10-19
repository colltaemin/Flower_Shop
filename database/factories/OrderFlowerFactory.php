<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderFlower>
 */
class OrderFlowerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'quantity' => '1',

            // 'created_at' => $this->faker->dateTimeBetween('-100 month', '+1 month'),
        ];
    }
}

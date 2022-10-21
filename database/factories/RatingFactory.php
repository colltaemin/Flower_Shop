<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rating>
 */
class RatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'rating' => $this->faker->numberBetween(1, 5),
            'product_id' => $this->faker->numberBetween(1, 100),
            'user_id' => $this->faker->numberBetween(1, 100),
            'content' => $this->faker->realTextBetween(10, 100),
            'name' => $this->faker->name,
        ];
    }
}

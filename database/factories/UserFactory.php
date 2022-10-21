<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $first_name = [
            'Đạt', 'Long', 'Hoàng', 'Chuyên', 'Chương', 'Công', 'Nam', 'Yến', 'Vắn Toàn', 'Hữu Trung', 'Linh Nhi', 'Bảo Long', 'Hoàng Hùng', 'Văn Định', 'Kiều Chi', 'Linh Nhi', 'Văn Đại', 'Hùng Dũng', 'Quang Linh', 'Thùy Tiên',
        ];

        $last_name = ['Hoàng', 'Lê', 'Huỳnh', 'Trần', 'Nguyễn', 'Võ', 'Trịnh',
        ];

        return [
            'name' => $this->faker->randomElement($last_name).' '.$this->faker->randomElement($first_name),
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$zB51E5Kktvf8iozW9k0IGek1eTQLDgv0txdcPUde1kSdnfZX0PX.O', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}

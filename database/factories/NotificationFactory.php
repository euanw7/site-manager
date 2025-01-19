<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'content' => fake()->realText(mt_rand(10, 255)),
            'date_received' => fake()->date('Y-m-d', 'now'),
            'user_id' => fake()->numberBetween(1, User::count()),
        ];
    }
}

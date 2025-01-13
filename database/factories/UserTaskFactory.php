<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserTaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->realText(mt_rand(1, 50)),
            'description' => fake()->realText(mt_rand(1, 255)),
            'due_date' => fake()->date('Y-m-d'),
        ];
    }
}

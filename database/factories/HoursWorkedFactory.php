<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class HoursWorkedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'hours' => fake()->randomFloat($nbMaxDecimals = 2, $min = 0)
        ];
    }
}

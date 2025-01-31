<?php

namespace Database\Factories;

use App\Models\JobPhase;
use Illuminate\Database\Eloquent\Factories\Factory;

class CriticalControlPointFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'method_statement' => fake()->realText(mt_rand(10, 1020)),
            'importance' => fake()->numberBetween(1, 3),
        ];
    }
}

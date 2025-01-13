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
            'method_statement' => fake()->realText(mt_rand(1, 1020)),
            'product_coverage' => fake()->randomFloat(2),
            'product_usage' => fake()->randomFloat(2),
            'product_tolerance' => fake()->randomFloat(2),
            'importance' => fake()->numberBetween(1, 3),
            'job_phase_id' => fake()->numberBetween(1, JobPhase::count()),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\JobListing;
use Illuminate\Database\Eloquent\Factories\Factory;

class SiteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->realText(mt_rand(10, 50)),
            'address' => fake()->address(),
            'employee_instructions' => fake()->realText(mt_rand(10, 510)),
        ];
    }
}

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
            'name' => fake()->realText(mt_rand(1, 50)),
            'address' => fake()->address(),
            'EmployeeInstructions' => fake()->realText(mt_rand(1, 510)),
            'job_listing_id' => fake()->numberBetween(1, JobListing::count()),
        ];
    }
}

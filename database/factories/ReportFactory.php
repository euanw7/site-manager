<?php

namespace Database\Factories;

use App\Models\JobListing;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'issues' => fake()->realText(mt_rand(10, 1020)),
            'user_id' => fake()->numberBetween(1, User::count()),
            'job_listing_id' => fake()->numberBetween(1, JobListing::count()),
        ];
    }
}

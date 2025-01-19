<?php

namespace Database\Factories;

use App\Models\HoursWorked;
use App\Models\JobListing;
use App\Models\User;
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
            'hours' => fake()->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 50),
            'user_id' => fake()->numberBetween(1, User::count()),
            'job_listing_id' => fake()->numberBetween(1, JobListing::count()),
        ];
    }
}

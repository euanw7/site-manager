<?php

namespace Database\Factories;

use App\Models\JobListing;
use App\Models\User;
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
            'title' => fake()->realText(mt_rand(10, 50)),
            'description' => fake()->realText(mt_rand(10, 255)),
            'due_date' => fake()->date('Y-m-d'),
            'user_assigned_to_id' => fake()->numberBetween(1, User::count()),
            'user_assigned_by_id' => fake()->numberBetween(1, User::count()),
            'job_listing_id' => fake()->numberBetween(1, JobListing::count()),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\JobListing;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserAssignedRole>
 */
class UserAssignedRoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->numberBetween(1, User::count()),
            'job_listing_id' => fake()->numberBetween(1, JobListing::count()),
            'user_role_id' => fake()->numberBetween(1, UserRole::count())
        ];
    }
}

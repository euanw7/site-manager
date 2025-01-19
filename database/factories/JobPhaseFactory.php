<?php

namespace Database\Factories;

use App\Models\JobListing;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobPhaseFactory extends Factory
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
            'start_date' => fake()->date('Y-m-d'),
            'end_date'=> fake()->date('Y-m-d'),
            'job_listing_id' => fake()->numberBetween(1, JobListing::count()),
        ];
    }
}

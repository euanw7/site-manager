<?php

namespace Database\Factories;

use App\Models\HoursWorked;
use App\Models\JobPhase;
use App\Models\Report;
use App\Models\UserTask;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'job_number' => fake()->numberBetween(1000, 5000),
            'title' => fake()->realText(mt_rand(1, 50)),
            'description' => fake()->realText(mt_rand(1, 255)),
            'start_date' => fake()->date('Y-m-d'),
            'end_date'=> fake()->date('Y-m-d'),
            'is_active' => true,
            'user_task_id' => fake()->numberBetween(1, UserTask::count()),
            'report_id' => fake()->numberBetween(1, Report::count()),
            'job_phase_id' => fake()->numberBetween(1, JobPhase::count()),
            'hours_worked_id' => fake()->numberBetween(1, HoursWorked::count()),
        ];
    }
}

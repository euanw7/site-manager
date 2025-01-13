<?php

namespace Database\Factories;

use App\Models\CriticalControlPoint;
use App\Models\JobTask;
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
            'title' => fake()->realText(mt_rand(1, 50)),
            'description' => fake()->realText(mt_rand(1, 255)),
            'start_date' => fake()->date('Y-m-d'),
            'end_date'=> fake()->date('Y-m-d'),
            'job_task_id' => fake()->numberBetween(1, JobTask::count()),
            'critical_control_point_id' => fake()->numberBetween(1, CriticalControlPoint::count()),
        ];
    }
}

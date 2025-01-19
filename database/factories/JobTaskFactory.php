<?php

namespace Database\Factories;

use App\Models\CriticalControlPoint;
use App\Models\JobPhase;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobTaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $quality_critical = fake()->boolean(50);
        
        return [
            'title' => fake()->realText(mt_rand(10, 50)),
            'description' => fake()->realText(mt_rand(10, 255)),
            'start_date' => fake()->date('Y-m-d'),
            'end_date'=> fake()->date('Y-m-d'),
            'quality_critical' => $quality_critical,
            'job_phase_id' => fake()->numberBetween(1, JobPhase::count()),
            'critical_control_point_id' => $quality_critical ? fake()->unique()->numberBetween(1, CriticalControlPoint::count()) : null,
        ];
    }
}

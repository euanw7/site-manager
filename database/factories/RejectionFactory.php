<?php

namespace Database\Factories;

use App\Models\HoursWorked;
use App\Models\JobTask;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RejectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $rejectables = [
            "JobTask",
            "HoursWorked"
        ];

        $rejectableType = fake()->randomElement($rejectables);
        
        if ($rejectableType == "JobTask")
        {
            return [
                'message' => fake()->realText(mt_rand(10, 255)),
                'rejectable_id' => fake()->numberBetween(1, JobTask::count()),
                'rejectable_type' => JobTask::class,
                'user_id' => fake()->numberBetween(1, User::count()),
            ];
        }
        else if ($rejectableType == "HoursWorked")
        {
            return [
                'message' => fake()->realText(mt_rand(10, 255)),
                'rejectable_id' => fake()->numberBetween(1, HoursWorked::count()),
                'rejectable_type' => HoursWorked::class,
                'user_id' => fake()->numberBetween(1, User::count()),
            ];
        }
    }
}

<?php

namespace Database\Factories;

use App\Models\HoursWorked;
use App\Models\JobTask;
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
            JobTask::class,
            HoursWorked::class
        ];

        $rejectableType = fake()->randomElement($rejectables);
        $rejectableInstance = $rejectableType::query()->inRandomOrder()->first();

        return [
            'message' => fake()->realText(mt_rand(1, 255)),
            'rejectable_id' => $rejectableInstance ? $rejectableInstance->id : null,
            'rejectable_type' => $rejectableType,
        ];
    }
}

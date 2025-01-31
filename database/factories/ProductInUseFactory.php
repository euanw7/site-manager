<?php

namespace Database\Factories;

use App\Models\CriticalControlPoint;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductInUse>
 */
class ProductInUseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_coverage' => fake()->randomFloat(2, 10, 100),
            'product_usage' => fake()->randomFloat(2, 10, 100),
            'product_tolerance' => fake()->randomFloat(2, 10, 100),
            'product_id' => fake()->numberBetween(1, Product::count()),
            'critical_control_point_id' => fake()->numberBetween(1, CriticalControlPoint::count())
        ];
    }
}

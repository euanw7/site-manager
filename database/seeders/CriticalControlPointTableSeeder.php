<?php

namespace Database\Seeders;

use App\Models\CriticalControlPoint;
use App\Models\Product;
use Illuminate\Database\Seeder;

class CriticalControlPointTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CriticalControlPoint::factory(5)
        //->has(Product::factory(2))
        ->create();
    }
}

<?php

namespace Database\Seeders;

use App\Models\CriticalControlPoint;
use Illuminate\Database\Seeder;

class CriticalControlPointTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CriticalControlPoint::factory(5)->create();
    }
}

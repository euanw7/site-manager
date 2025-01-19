<?php

namespace Database\Seeders;

use App\Models\JobPhase;
use Illuminate\Database\Seeder;

class JobPhaseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JobPhase::factory(7)->create();
    }
}

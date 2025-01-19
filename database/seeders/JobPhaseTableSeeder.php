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
        $j = new JobPhase([
            'title' => "Job phase title",
            'description' => "This is the description of a job phase.",
            'start_date' => "2025-01-01",
            'end_date' => "2025-01-15",
            'job_listing_id' => 1,
        ]);
        $j->save();

        JobPhase::factory(7)->create();
    }
}

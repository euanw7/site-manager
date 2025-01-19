<?php

namespace Database\Seeders;

use App\Models\JobTask;
use Illuminate\Database\Seeder;

class JobTaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $j = new JobTask([
            'title' => "Job title",
            'description' => "This is the description of a job.",
            'start_date' => "2025-01-01",
            'end_date' => "2025-01-10",
            'quality_critical' => true,
            'job_phase_id' => 1,
            'critical_control_point_id' => null,
        ]);
        $j->save();

        JobTask::factory(9)->create();
    }
}

<?php

namespace Database\Seeders;

use App\Models\JobListing;
use Illuminate\Database\Seeder;

class JobListingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $j = new JobListing([
            'job_number' => 1234,
            'title' => "Job title",
            'description' => "This is the description of a job.",
            'start_date' => "2025-01-01",
            'end_date' => "2025-02-01",
            'is_active' => true,
            'site_id' => 1,
        ]);
        $j->save();

        $j = new JobListing([
            'job_number' => 5678,
            'title' => "Job title 2",
            'description' => "This is the description of another job.",
            'start_date' => "2025-01-02",
            'end_date' => "2025-02-02",
            'is_active' => false,
            'site_id' => 1,
        ]);
        $j->save();

        JobListing::factory(5)->create();
    }
}

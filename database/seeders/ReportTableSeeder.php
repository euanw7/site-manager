<?php

namespace Database\Seeders;

use App\Models\Report;
use Illuminate\Database\Seeder;

class ReportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $r = new Report([
            'issues' => "These are the issues listed for this report.",
            'user_id' => 1,
            'job_listing_id' => 1,
        ]);
        $r->save();

        Report::factory(5)->create();
    }
}

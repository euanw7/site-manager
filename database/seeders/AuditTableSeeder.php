<?php

namespace Database\Seeders;

use App\Models\Audit;
use App\Models\JobListing;
use Illuminate\Database\Seeder;

class AuditTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $a = new Audit([
            'content' => "This is an audit. It can be used to evaluate jobs.",
            'user_id' => 1.
        ]);
        $a->save();

        Audit::factory(2)->create();
        $audits = Audit::factory(2)->create();
        foreach ($audits as $audit)
        {
            // Fetch all product IDs
            $jobListingIds = JobListing::pluck('id')->toArray();
            
            // Shuffle and select a random subset of product IDs
            shuffle($jobListingIds);
            $randomJobListingIds = array_slice($jobListingIds, 0, mt_rand(1, count($jobListingIds)));
            
            // Attach the random products to the current CCP
            $audit->job_listings()->attach($randomJobListingIds);
        }
    }
}

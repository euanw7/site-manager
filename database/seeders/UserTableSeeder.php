<?php

namespace Database\Seeders;

use App\Models\JobListing;
use App\Models\Site;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::factory(10)->create();
        foreach ($users as $user)
        {
            // Fetch all product IDs
            $siteIds = Site::pluck('id')->toArray();
            $jobListingIds = JobListing::pluck('id')->toArray();
            
            // Shuffle and select a random subset of product IDs
            shuffle($siteIds);
            shuffle($jobListingIds);
            $randomSiteIds = array_slice($siteIds, 0, mt_rand(1, count($siteIds)));
            $randomJobListingIds = array_slice($jobListingIds, 0, mt_rand(1, count($jobListingIds)));
            
            // Attach the random products to the current CCP
            $user->sites()->attach($randomSiteIds);
            $user->job_listings()->attach($randomJobListingIds);
        }
    }
}

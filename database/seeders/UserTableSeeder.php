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
        $admin = new User([
            'name' => "John Web",
            'email' => "john@web.com",
            'has_allowed_emails' => true,
            'password' => "password",
            'is_admin' => true,
        ]);
        $admin->save();

        $user = new User([
            'name' => "Stuart Little",
            'email' => "slittle@web.com",
            'has_allowed_emails' => true,
            'password' => "password",
            'is_admin' => false,
        ]);
        $user->save();

        $users = User::factory(10)->create();
        foreach ($users as $user)
        {
            // Fetch all product IDs
            $siteIds = Site::pluck('id')->toArray();
            
            // Shuffle and select a random subset of product IDs
            shuffle($siteIds);
            $randomSiteIds = array_slice($siteIds, 0, mt_rand(1, count($siteIds)));
            
            // Attach the random products to the current user
            $user->sites()->attach($randomSiteIds);
        }
    }
}

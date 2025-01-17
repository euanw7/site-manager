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
        User::factory(10)
        //->has(Site::factory(5))
        //->has(JobListing::factory(2))
        ->create();
    }
}

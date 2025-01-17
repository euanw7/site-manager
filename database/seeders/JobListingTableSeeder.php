<?php

namespace Database\Seeders;

use App\Models\Audit;
use App\Models\JobListing;
use App\Models\User;
use Illuminate\Database\Seeder;

class JobListingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JobListing::factory(5)
        ->has(Audit::factory(1))
        ->has(User::factory(5))
        ->create();
    }
}

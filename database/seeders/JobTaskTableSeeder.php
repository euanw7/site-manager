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
        JobTask::factory(9)->create();
    }
}

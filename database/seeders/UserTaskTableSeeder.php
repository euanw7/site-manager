<?php

namespace Database\Seeders;

use App\Models\UserTask;
use Illuminate\Database\Seeder;

class UserTaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserTask::factory(5)->create();
    }
}

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
        $u = new UserTask([
            'title' => "UserTask title",
            'description' => "This is the description of a user task",
            'due_date' => "2025-02-01",
            'user_assigned_to_id' => 1,
            'user_assigned_by_id' => 2,
            'job_listing_id' => 1,
        ]);
        $u->save();

        UserTask::factory(5)->create();
    }
}

<?php

namespace Database\Seeders;

use App\Models\HoursWorked;
use App\Models\JobTask;
use App\Models\Rejection;
use Illuminate\Database\Seeder;

class RejectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $r1 = new Rejection([
            'message' => "This is a rejection message for a JobTask.",
            'rejectable_id' => 1,
            'rejectable_type' => JobTask::class,
            'user_id' => 1,
        ]);
        $r1->save();

        $r2 = new Rejection([
            'message' => "This is a rejection message for HoursWorked.",
            'rejectable_id' => 1,
            'rejectable_type' => HoursWorked::class,
            'user_id' => 1,
        ]);
        $r2->save();

        Rejection::factory(5)->create();
    }
}

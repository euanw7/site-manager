<?php

namespace Database\Seeders;

use App\Models\HoursWorked;
use App\Models\User;
use Illuminate\Database\Seeder;

class HoursWorkedTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $h = new HoursWorked([
            'hours' => 10.50,
            'user_id' => 1,
            'job_listing_id' => 1
        ]);
        $h->save();

        HoursWorked::factory(10)->create();
    }
}

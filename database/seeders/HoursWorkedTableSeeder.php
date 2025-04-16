<?php

namespace Database\Seeders;

use App\Models\HoursWorked;
use App\Models\User;
use DateTime;
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
            'job_listing_id' => 1,
            'date' => new DateTime(),
        ]);
        $h->save();

        HoursWorked::factory(10)->create();
    }
}

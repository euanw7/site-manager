<?php

namespace Database\Seeders;

use App\Models\Rejection;
use Illuminate\Database\Seeder;

class RejectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rejection::factory(2)->create();
    }
}

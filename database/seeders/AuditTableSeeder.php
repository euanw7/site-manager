<?php

namespace Database\Seeders;

use App\Models\Audit;
use Illuminate\Database\Seeder;

class AuditTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Audit::factory(2)->create();
    }
}

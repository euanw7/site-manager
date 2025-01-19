<?php

namespace Database\Seeders;

use App\Models\Site;
use Illuminate\Database\Seeder;

class SiteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $s = new Site([
            'name' => "Swansea University",
            'address' => "1 Big Road, Big City, PXK7 1CM",
            'employee_instructions' => "Park behind the green bin",
            'job_listing_id' => 1,
        ]);
        $s->save();

        Site::factory(2)->create();
    }
}

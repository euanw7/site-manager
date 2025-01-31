<?php

namespace Database\Seeders;

use App\Models\CriticalControlPoint;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CriticalControlPointTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $c = new CriticalControlPoint([
            'method_statement' => "The method statement gives a detailed explanation on how a CCP should be completed.",
            'importance' => 1,
        ]);
        $c->save();

        CriticalControlPoint::factory(9)->create();
    }
}

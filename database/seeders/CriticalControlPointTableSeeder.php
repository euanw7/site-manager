<?php

namespace Database\Seeders;

use App\Models\CriticalControlPoint;
use Illuminate\Database\Seeder;

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

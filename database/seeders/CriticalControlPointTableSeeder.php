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
            'product_coverage' => 1.50,
            'product_usage' => 5.25,
            'product_tolerance' => 3.42,
            'importance' => 1,
        ]);
        $c->save();

        $ccps = CriticalControlPoint::factory(9)->create();
        foreach ($ccps as $ccp)
        {
            // Fetch all product IDs
            $productIds = Product::pluck('id')->toArray();
            
            // Shuffle and select a random subset of product IDs
            shuffle($productIds);
            $randomProductIds = array_slice($productIds, 0, mt_rand(1, count($productIds)));
            
            // Attach the random products to the current CCP
            $ccp->products()->attach($randomProductIds);
        }
    }
}

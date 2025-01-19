<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $p = new Product([
            'name' => "Product Name",
            'description' => "This is the description of a product",
        ]);
        $p->save();

        Product::factory(10)->create();
    }
}

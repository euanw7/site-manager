<?php

namespace Database\Seeders;

use App\Models\ProductInUse;
use Illuminate\Database\Seeder;

class ProductInUseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductInUse::factory(10)->create();
    }
}

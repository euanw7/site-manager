<?php

use App\Models\CriticalControlPoint;
use App\Models\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_in_uses', function (Blueprint $table) {
            $table->id();
            $table->double('product_coverage', 8, 2)->unsigned(); // unsigned for only positive values
            $table->double('product_usage', 8, 2)->unsigned(); // 8 digits total, 2 after the decimal point
            $table->double('product_tolerance', 8, 2)->unsigned();

            $table->foreignIdFor(Product::class)->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(CriticalControlPoint::class)->cascadeOnDelete()->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_in_uses');
    }
};

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
        Schema::create('critical_control_point_product', function (Blueprint $table) {
            $table->primary(['critical_control_point_id', 'product_id']);
            $table->foreignIdFor(CriticalControlPoint::class)->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Product::class)->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('critical_control_point_product');
    }
};

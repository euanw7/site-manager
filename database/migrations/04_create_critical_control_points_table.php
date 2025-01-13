<?php

use App\Models\JobPhase;
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
        Schema::create('critical_control_points', function (Blueprint $table) {
            $table->id();
            $table->string('method_statement', 1020);
            $table->double('product_coverage', 8, 2)->unsigned(); // unsigned for only positive values
            $table->double('product_usage', 8, 2)->unsigned(); // 8 digits total, 2 after the decimal point
            $table->double('product_tolerance', 8, 2)->unsigned();
            $table->integer('importance');

            $table->foreignIdFor(JobPhase::class)->cascadeOnDelete()->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('critical_control_points');
    }
};

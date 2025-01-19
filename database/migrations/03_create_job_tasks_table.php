<?php

use App\Models\CriticalControlPoint;
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
        Schema::create('job_tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50);
            $table->string('description', 255);
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->boolean('approved')->default(false);
            $table->boolean('quality_critical');

            $table->foreignIdFor(JobPhase::class)->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(CriticalControlPoint::class)->cascadeOnDelete()->cascadeOnUpdate()->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_tasks');
    }
};

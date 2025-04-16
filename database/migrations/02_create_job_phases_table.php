<?php

use App\Models\CriticalControlPoint;
use App\Models\JobListing;
use App\Models\JobTask;
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
        Schema::create('job_phases', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50);
            $table->string('description', 255);
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->boolean('isFinished')->default(false);
            
            $table->foreignIdFor(JobListing::class)->cascadeOnDelete()->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_phases');
    }
};

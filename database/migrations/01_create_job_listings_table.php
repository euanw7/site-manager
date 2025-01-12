<?php

use App\Models\HoursWorked;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\UserTask;
use App\Models\Report;
use App\Models\JobPhase;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_listings', function (Blueprint $table) {
            $table->id();
            $table->integer('job_number');
            $table->string('title', 50);
            $table->string('description', 255);
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->boolean('is_active');

            $table->foreignIdFor(UserTask::class)->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Report::class)->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(JobPhase::class)->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(HoursWorked::class)->cascadeOnDelete()->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_listings');
    }
};

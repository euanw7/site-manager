<?php

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
        Schema::create('job_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('approval_description')->nullable();
            $table->string('approval_image')->nullable();
            $table->double('approval_product_coverage')->nullable();
            $table->double('approval_product_usage')->nullable();

            $table->boolean('approved')->default(false);
            $table->boolean('rejected')->default(false);
            $table->string('message')->default("No message given.");

            $table->foreignIdFor(JobTask::class)->cascadeOnDelete()->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_submissions');
    }
};

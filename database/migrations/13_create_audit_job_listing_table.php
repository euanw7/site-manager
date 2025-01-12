<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Audit;
use App\Models\JobListing;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('audit_job_listing', function (Blueprint $table) {
            $table->primary(['audit_id', 'job_listing_id']);
            $table->foreignIdFor(Audit::class)->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(JobListing::class)->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audit_job_listing');
    }
};

<?php

use App\Models\JobListing;
use App\Models\User;
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
        Schema::create('job_listing_user', function (Blueprint $table) {
            $table->primary(['job_listing_id', 'user_id']);
            $table->foreignIdFor(JobListing::class)->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(User::class)->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_listing_user');
    }
};

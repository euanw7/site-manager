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
        Schema::create('user_tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50);
            $table->string('description', 255);
            $table->dateTime('due_date');
            
            $table->foreignIdFor(User::class, 'user_assigned_to_id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(User::class, 'user_assigned_by_id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(JobListing::class)->cascadeOnDelete()->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_tasks');
    }
};

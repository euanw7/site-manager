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
        Schema::create('hours_workeds', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->double('hours', 3, 1);
            $table->boolean('approved')->default(false);

            $table->foreignIdFor(User::class)->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(JobListing::class)->cascadeOnDelete()->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hours_workeds');
    }
};

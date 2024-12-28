<?php

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
        Schema::create('esrb_ratings', function (Blueprint $table) {
            $table->id();
            $table->string('rating');            // ESRB rating (e.g., E, T, M, etc.)
            $table->text('description')->nullable(); // Description of the rating
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('esrb_ratings');
    }
};

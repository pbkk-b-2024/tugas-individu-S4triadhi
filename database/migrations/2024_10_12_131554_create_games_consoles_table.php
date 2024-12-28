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
        Schema::create('game_consoles', function (Blueprint $table) {
            $table->id();
            $table->string('name');              // Console name (e.g., PlayStation 5, Xbox Series X)
            $table->string('manufacturer');      // Manufacturer (e.g., Sony, Microsoft)
            $table->date('release_date')->nullable(); // Release date
            $table->string('generation')->nullable(); // Console generation
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games_consoles');
    }
};

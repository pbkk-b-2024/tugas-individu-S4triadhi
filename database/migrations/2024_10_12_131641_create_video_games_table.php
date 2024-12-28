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
        Schema::create('video_games', function (Blueprint $table) {
            $table->id();
            $table->string('title');             // Video game title
            $table->text('description')->nullable(); // Game description
            $table->foreignId('developer_id')->constrained('developers'); // Foreign key to developer
            $table->foreignId('publisher_id')->constrained('publishers'); // Foreign key to publisher
            $table->foreignId('esrb_rating_id')->constrained('esrb_ratings'); // Foreign key to ESRB rating
            $table->foreignId('genre_id')->constrained('genres'); // Foreign key to genre
            $table->foreignId('console_id')->constrained('games_consoles')->nullable(); // Foreign key to console
            $table->date('release_date')->nullable(); // Release date
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video_games');
    }
};

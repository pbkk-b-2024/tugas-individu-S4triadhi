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
        Schema::create('esport_events', function (Blueprint $table) {
            $table->id();
            $table->string('name');              // Event name (e.g., The International, LoL Worlds)
            $table->date('event_date');          // Date of the event
            $table->string('location')->nullable(); // Event location
            $table->string('prize_pool')->nullable(); // Prize pool
            $table->text('description')->nullable(); // Event description
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('esport_events');
    }
};

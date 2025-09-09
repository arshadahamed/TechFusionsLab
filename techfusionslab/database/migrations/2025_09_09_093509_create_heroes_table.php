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
        Schema::create('heroes', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // e.g. "EMPOWERING YOUR FINANCIAL CONFIDENCE"
            $table->string('highlight')->nullable(); // e.g. "CONFIDENCE"
            $table->text('description')->nullable(); // e.g. paragraph text
            $table->string('button_text')->nullable(); // e.g. "FREE CONSULTATION"
            $table->string('button_link')->nullable(); // e.g. "/contact"
            $table->string('main_image')->nullable(); // hero image path
            $table->string('bg_image')->nullable();   // background image path
            $table->string('map_image')->nullable();  // map image path
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('heroes');
    }
};

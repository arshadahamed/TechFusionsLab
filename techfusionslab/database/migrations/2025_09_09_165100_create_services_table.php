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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');              // Service title
            $table->string('number')->nullable(); // 01, 02, 03, 04...
            $table->string('icon')->nullable();   // icon path (svg, png)
            $table->string('link')->nullable();   // service-details link
            $table->text('description')->nullable();
            $table->string('hover_image')->nullable(); // hover bg
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};

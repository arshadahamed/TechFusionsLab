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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');                       // Blog title
            $table->string('slug')->unique();              // SEO-friendly URL
            $table->string('main_image')->nullable();      // Featured image
            $table->longText('content')->nullable();       // Blog content
            $table->string('author_name')->nullable();     // Blog author
            $table->string('author_image')->nullable();    // Author image
            $table->date('published_at')->nullable();      // Publish date
            $table->string('tags')->nullable();            // Comma-separated tags
            $table->string('category')->nullable();        // Blog category
            $table->string('subtitle')->nullable();
            $table->boolean('is_featured')->default(false); // Featured blog flag
            // SEO fields
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->timestamps();});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};

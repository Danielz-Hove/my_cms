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
        Schema::create('hero_sections', function (Blueprint $table) {
            $table->id();
            $table->string('page_slug')->unique()->nullable();
            $table->string('page_title')->nullable();
            $table->string('page_status')->default('draft');
            $table->text('page_meta_description')->nullable();
            $table->string('page_meta_keywords')->nullable();
            $table->string('hero_title')->nullable();
            $table->string('hero_subtitle')->nullable();
            $table->string('hero_subtitle_icon')->nullable();
            $table->text('hero_description')->nullable();
            $table->string('hero_button_text')->nullable();
            $table->string('hero_button_url')->nullable();
            $table->string('hero_video_url')->nullable();
            $table->string('hero_background_image')->nullable();
            $table->string('hero_foreground_image')->nullable();
            $table->json('hero_features')->nullable(); // Add this line!
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_sections');
    }
};
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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('status')->default('draft');
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();

            $table->string('hero_title')->nullable();
            $table->text('hero_description')->nullable();
            $table->string('hero_button_text')->nullable();
            $table->string('hero_button_url')->nullable();
            $table->string('hero_video_url')->nullable();
            $table->text('hero_background_image')->nullable();
            $table->text('hero_foreground_image')->nullable();

            $table->string('cta_headline')->nullable(); // ADDED
            $table->text('cta_description')->nullable(); // ADDED
            $table->string('cta_button_text')->nullable(); // ADDED
            $table->string('cta_button_url')->nullable();   // ADDED

            $table->string('features_headline')->nullable();
            $table->text('features_subheading')->nullable();

            $table->text('content');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
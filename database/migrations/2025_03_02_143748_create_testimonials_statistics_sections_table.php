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
        Schema::create('testimonials_statistics_sections', function (Blueprint $table) {
            $table->id();
            $table->string('page_slug')->unique()->nullable(); // Unique slug for the page
            $table->string('page_title')->nullable();
            $table->string('page_status')->default('draft');
            $table->text('page_meta_description')->nullable();
            $table->string('page_meta_keywords')->nullable();
            $table->string('title')->nullable(); // Add this line
            $table->text('subtext')->nullable(); // Add this line
            $table->json('testimonials')->nullable(); // Store testimonials as JSON array
            $table->json('statistics')->nullable(); // Store statistics as JSON array
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials_statistics_sections');
    }
};
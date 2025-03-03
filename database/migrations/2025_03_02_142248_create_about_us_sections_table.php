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
        Schema::create('about_us_sections', function (Blueprint $table) {
            $table->id();
            $table->string('page_slug')->unique();
            $table->string('about_us_subheading')->nullable();
            $table->string('about_us_title')->nullable();
            $table->text('about_us_description')->nullable();
            $table->string('about_us_meeting_image')->nullable();
            $table->integer('experience_years')->nullable();
            $table->text('experience_description')->nullable();
            $table->json('about_us_features')->nullable();
            $table->json('about_us_iconlist')->nullable();
            $table->enum('page_status', ['draft', 'published'])->default('draft'); // Added Status
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us_sections');
    }
};
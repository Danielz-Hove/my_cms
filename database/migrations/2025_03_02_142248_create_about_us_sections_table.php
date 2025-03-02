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
            $table->string('page_slug')->index();
            $table->string('page_title')->nullable();
            $table->enum('page_status', ['draft', 'published'])->default('draft');
            $table->text('page_meta_description')->nullable();
            $table->string('page_meta_keywords')->nullable();
            $table->string('about_us_subheading')->nullable();
            $table->string('about_us_title')->nullable();
            $table->text('about_us_description')->nullable();
            $table->string('about_us_meeting_image')->nullable();
            $table->integer('experience_years')->nullable();
            $table->string('experience_text')->nullable();
            $table->text('experience_description')->nullable();
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
<?php
// database/migrations/xxxx_xx_xx_create_testimonials_table.php

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
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->constrained()->onDelete('cascade'); // Foreign key to pages table
            $table->string('testimonial_icon')->nullable();
            $table->string('testimonial_title')->nullable();
            $table->string('testimonial_subtitle')->nullable();
            $table->integer('testimonial_stars')->nullable();
            $table->text('testimonial_paragraph')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
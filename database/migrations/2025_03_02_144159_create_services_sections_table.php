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
        Schema::create('services_sections', function (Blueprint $table) {
            $table->id();
            $table->string('page_slug')->index();
            $table->string('page_title')->nullable();
            $table->enum('page_status', ['draft', 'published'])->default('draft');
            $table->text('page_meta_description')->nullable();
            $table->string('page_meta_keywords')->nullable();
            $table->string('services_title')->nullable();
            $table->text('services_subtext')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services_sections');
    }
};
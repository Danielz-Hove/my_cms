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
        Schema::create('features_tabbed_sections', function (Blueprint $table) {
            $table->id();
            $table->string('page_slug')->index();
            $table->string('page_title')->nullable();
            $table->enum('page_status', ['draft', 'published'])->default('draft');
            $table->text('page_meta_description')->nullable();
            $table->string('page_meta_keywords')->nullable();
            $table->string('features_headline')->nullable();
            $table->text('features_subheading')->nullable();
            $table->json('tabs')->nullable(); // Added JSON column for tabs

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('features_tabbed_sections');
    }
};
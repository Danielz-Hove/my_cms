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
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->string('faq_section_heading')->nullable();
            $table->text('faq_short_description')->nullable();
            $table->json('faq_accordion')->nullable(); // Use JSON column type
            $table->text('faq_cta_short_description')->nullable();
            $table->string('faq_cta_button_text')->nullable();
            $table->string('faq_cta_button_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faqs');
    }
};
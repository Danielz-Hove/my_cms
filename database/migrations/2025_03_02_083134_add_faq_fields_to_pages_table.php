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
        Schema::table('pages', function (Blueprint $table) {
            $table->string('faq_section_heading')->nullable();
            $table->text('faq_short_description')->nullable();
            $table->json('faq_accordion')->nullable(); // Store as JSON
            $table->text('faq_cta_short_description')->nullable();
            $table->string('faq_cta_button_text')->nullable();
            $table->string('faq_cta_button_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn('faq_section_heading');
            $table->dropColumn('faq_short_description');
            $table->dropColumn('faq_accordion');
            $table->dropColumn('faq_cta_short_description');
            $table->dropColumn('faq_cta_button_text');
            $table->dropColumn('faq_cta_button_url');
        });
    }
};

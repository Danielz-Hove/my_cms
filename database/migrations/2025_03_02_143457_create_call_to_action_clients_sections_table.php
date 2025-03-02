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
        Schema::create('call_to_action_clients_sections', function (Blueprint $table) {
            $table->id();
            $table->string('page_slug')->index()->nullable(); // Add ->nullable() here
            $table->string('page_title')->nullable();
            $table->enum('page_status', ['draft', 'published'])->default('draft');
            $table->text('page_meta_description')->nullable();
            $table->string('page_meta_keywords')->nullable();
            $table->string('cta_headline')->nullable();
            $table->text('cta_description')->nullable();
            $table->string('cta_button_text')->nullable();
            $table->string('cta_button_url')->nullable();
            $table->json('client_logos')->nullable(); // Store Client Logos as JSON
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('call_to_action_clients_sections');
    }
};
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
            $table->string('page_slug')->nullable();
            $table->string('services_title')->nullable();
            $table->text('services_subtext')->nullable();
            $table->json('service_cards')->nullable();
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
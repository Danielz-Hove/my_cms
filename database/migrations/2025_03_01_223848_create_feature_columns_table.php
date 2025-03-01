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
        Schema::create('feature_columns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tabbed_feature_id')->constrained()->onDelete('cascade'); // Foreign key to tabbed_features table
            $table->string('column_icon')->nullable();
            $table->string('column_heading')->nullable();
            $table->text('column_paragraph')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feature_columns');
    }
};
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
        Schema::create('tab_lists', function (Blueprint $table) {
            $table->id();
            $table->string('tab_list_icon')->nullable();
            $table->string('tab_list_text')->nullable();
            $table->string('tab_image')->nullable();
            $table->foreignId('tabbed_feature_id')->nullable()->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tab_lists');
    }
};
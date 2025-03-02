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
      //  Schema::table('pages', function (Blueprint $table) {
       //     $table->string('contact_title')->nullable();
        //    $table->text('contact_subtitle')->nullable();
        //    $table->string('contact_sidebar_title')->nullable();
        //    $table->text('contact_paragraph')->nullable();
        //    $table->json('contact_features')->nullable(); // Store as JSON for repeater data
        //});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn('contact_title');
            $table->dropColumn('contact_subtitle');
            $table->dropColumn('contact_sidebar_title');
            $table->dropColumn('contact_paragraph');
            $table->dropColumn('contact_features');
        });
    }
};
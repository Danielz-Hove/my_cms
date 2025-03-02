<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeaturesSectionsTable extends Migration
{
    public function up()
    {
        Schema::create('features_sections', function (Blueprint $table) {
            $table->id();
            $table->string('page_slug');
            $table->string('page_title');
            $table->string('page_status')->default('draft');
            $table->text('page_meta_description')->nullable();
            $table->string('page_meta_keywords')->nullable();
            $table->json('features')->nullable(); // Use json data type!
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('features_sections');
    }
}
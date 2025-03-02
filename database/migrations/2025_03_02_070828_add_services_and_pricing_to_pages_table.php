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
            // Services Section
            $table->string('services_title')->nullable()->after('content');
            $table->text('services_subtext')->nullable()->after('services_title');
            $table->json('service_cards')->nullable()->after('services_subtext');

            // Pricing Section
            $table->string('pricing_title')->nullable()->after('service_cards');
            $table->text('pricing_subtext')->nullable()->after('pricing_title');
            $table->json('pricing_plans')->nullable()->after('pricing_subtext');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn([
                'services_title',
                'services_subtext',
                'service_cards',
                'pricing_title',
                'pricing_subtext',
                'pricing_plans',
            ]);
        });
    }
};
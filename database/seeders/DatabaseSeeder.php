<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         $this->call([
             WebsiteSettingsSeeder::class,
         ]);
         $this->call([
            UserSeeder::class,
        ]);
        $this->call([
            HeroSectionSeeder::class,
            AboutUsSectionSeeder::class,
            FeaturesTabbedSectionSeeder::class,
            FeaturesSectionSeeder::class,
            CallToActionClientsSectionSeeder::class,
            TestimonialsStatisticsSectionSeeder::class,
            ServicesSectionSeeder::class,
            PricingSectionSeeder::class,
            FaqSeeder::class,
            ContactSectionSeeder::class,
        ]);
    }
}
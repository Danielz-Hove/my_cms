<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HeroSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Check if the hero section already exists
        $heroSectionExists = DB::table('hero_sections')->exists();

        if (!$heroSectionExists) {
            DB::table('hero_sections')->insert([
                'hero_subtitle' => 'Working for your success',
                'hero_title' => 'Maecenas Vitae Consectetur Led Vestibulum Ante',
                'page_title' => 'Strategic Digital Growth',  // Adjusted Page Title
                'hero_description' => "Nullam quis ante. Etiam sit amet eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna.",
                'hero_button_text' => 'Get Started', //
                'hero_button_url' => '/features',
                'hero_video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ', // Consider replacing with a professional demo video
                'hero_background_image' => 'images/hero-bg.jpg', // Placeholder:  replace with an actual path
                'hero_foreground_image' => 'images/hero-foreground.png', // Placeholder
                'hero_features' => json_encode([
                    [
                        'icon' => 'fa fa-trophy',  // Updated Icon
                        'heading' => '3x Won Awards',
                        'paragraph' => 'Vestibulum ante',
                    ],
                    [
                        'icon' => 'fa fa-thumbs-up',  // Updated Icon
                        'heading' => '6.5k Faucibus',
                        'paragraph' => 'Nullam quis ante',
                    ],
                    [
                        'icon' => 'fa fa-area-chart',  // Updated Icon
                        'heading' => '80k Mauris',
                        'paragraph' => 'Etiam sit amet',
                    ],
                    [
                        'icon' => 'fa fa-check-square-o',  // Updated Icon
                        'heading' => '12k Pretium',
                        'paragraph' => 'Vestibulum ante',
                    ],
                ]),
                'hero_subtitle_icon' => 'fa fa-gear', // Changed to fa fa-gear for default icon
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } else {
            $this->command->info("Hero section already seeded. Skipping.");
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutUsSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Check if the about us section already exists
        $aboutUsSectionExists = DB::table('about_us_sections')->exists();

        if (!$aboutUsSectionExists) {
            DB::table('about_us_sections')->insert([
                'about_us_subheading' => 'More About Us', // Updated
                'about_us_title' => 'Voluptas enim suscipit temporibus', // OCR Text
                'about_us_description' => "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.",
                'about_us_meeting_image' => 'images/about-us-meeting.jpg', // Placeholder
                'experience_years' => '15',  // Based on the Image
                'experience_description' => 'Of experience in business service', // OCR Text
                'about_us_iconlist' => json_encode([
                    [
                        'icon' => 'fa fa-check',  // Updated
                        'text' => 'Lorem ipsum dolor sit amet', // Updated
                    ],
                    [
                        'icon' => 'fa fa-check',  // Updated
                        'text' => 'Consectetur adipiscing elit', // Updated
                    ],
                    [
                        'icon' => 'fa fa-check',  // Updated
                        'text' => 'Sed do eiusmod tempor', // Updated
                    ],
                    [
                        'icon' => 'fa fa-check',  // Updated
                        'text' => 'Dolore magna aliqua', // Updated
                    ],
                    [
                        'icon' => 'fa fa-check',  // Updated
                        'text' => 'Ut enim ad minim veniam', // Updated
                    ],
                    [
                        'icon' => 'fa fa-check',  // Updated
                        'text' => 'Ut utma ad minim venias', // Updated
                    ],
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } else {
            $this->command->info("About us section already seeded. Skipping.");
        }
    }
}
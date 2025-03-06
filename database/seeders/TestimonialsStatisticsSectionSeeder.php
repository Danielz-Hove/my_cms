<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TestimonialsStatisticsSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $testimonialsStatisticsSectionExists = DB::table('testimonials_statistics_sections')->exists();

        if (!$testimonialsStatisticsSectionExists) {
            DB::table('testimonials_statistics_sections')->insert([
                'testimonials' => json_encode([
                    [
                        'testimonial_title' => 'Saul Goodman',
                        'position' => 'Ceo & Founder',
                        'image' => 'images/profile.jpg', // Placeholder
                        'star_rating' => 5, // As shown in image
                        'paragraph' => "Proasis praes catas parass consequat sem quirs alicies Quam quistia alicies dolores ilum tempore.",
                    ],
                     [
                        'testimonial_title' => 'Sara Wilson',
                        'position' => 'Designer',
                        'image' => 'images/profile.jpg', // Placeholder
                        'star_rating' => 5, // As shown in image
                        'paragraph' => "Exceputi tempor ilium taties catas malis Quam quistia malis Quam quistia alicies Quam quistia alicies dolores ilum tempore.",
                    ],
                    [
                        'testimonial_title' => 'Jena Karlis',
                        'position' => 'Store Owner',
                        'image' => 'images/profile.jpg', // Placeholder
                        'star_rating' => 5, // As shown in image
                        'paragraph' => "Yours ilium quisti catas export dolores catas Quam magna quistia ratione culpas Quam quistia alicies dolores ilum tempore.",
                    ],
                    [
                        'testimonial_title' => 'Matt Brandon',
                        'position' => 'Freelancer',
                        'image' => 'images/profile.jpg', // Placeholder
                        'star_rating' => 5, // As shown in image
                        'paragraph' => "Fugitat volupte ilium taties culpas dolores malis Quam catas Quam quistia alicies Quam quistia alicies dolores ilum tempore.",
                    ],
                ]),
                'statistics' => json_encode([
                    [
                        'statistic_number' => '232',  // As shown in the image
                        'statistic_text' => 'Clients', // As shown in the image
                    ],
                    [
                        'statistic_number' => '521',  // As shown in the image
                        'statistic_text' => 'Projects', // As shown in the image
                    ],
                     [
                        'statistic_number' => '1453',  // As shown in the image
                        'statistic_text' => 'Hours of Support', // As shown in the image
                    ],
                     [
                        'statistic_number' => '32',  // As shown in the image
                        'statistic_text' => 'Workers', // As shown in the image
                    ],
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeaturesTabbedSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Check if the features tabbed section already exists
        $featuresTabbedSectionExists = DB::table('features_tabbed_sections')->exists();

        if (!$featuresTabbedSectionExists) {
            DB::table('features_tabbed_sections')->insert([
                'features_headline' => 'Features',  // Title
                'features_subheading' => "Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit.",
                'tabs' => json_encode([
                    [
                        'title' => 'Medusa',  // Title from Tab
                        'subtitle' => 'Voluptatem dignissimos provident',  // Title from Subtitle
                        'content' => "Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit. Ullamco laboris nisi ut aliquip ex ea commodo consequat. Ullamco laboris nisi ut aliquip ex ea commodo consequat.",
                        'image' => 'images/drag-and-drop.jpg', // Placeholder
                        'icon_list' => [
                            [
                                'icon' => 'fa fa-check',
                                'text' => 'Ullamco laboris nisi ut commodo consequat.',
                            ],
                            [
                                'icon' => 'fa fa-check',
                                'text' => 'Duis aute irure dolor in reprehenderit in voluptate velit.',
                            ],
                            [
                                'icon' => 'fa fa-check',
                                'text' => 'Ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                            ],
                        ],
                    ],
                    [
                        'title' => 'Preasants',  // Added Tab
                        'subtitle' => 'Preasants Voluptatum',  // Added Subtitle
                        'content' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.",
                        'image' => 'images/preasants.jpg', // Placeholder
                        'icon_list' => [
                            [
                                'icon' => 'fa fa-check',
                                'text' => 'Ullamco laboris nisi ut commodo consequat.',
                            ],
                            [
                                'icon' => 'fa fa-check',
                                'text' => 'Duis aute irure dolor in reprehenderit in voluptate velit.',
                            ],
                            [
                                'icon' => 'fa fa-check',
                                'text' => 'Ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                            ],
                        ],
                    ],
                    [
                        'title' => 'Explica',  // Added Tab
                        'subtitle' => 'Explica Voluptatum',  // Added Subtitle
                        'content' => "Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.",
                        'image' => 'images/explica.jpg', // Placeholder
                        'icon_list' => [
                            [
                                'icon' => 'fa fa-check',
                                'text' => 'Ullamco laboris nisi ut commodo consequat.',
                            ],
                            [
                                'icon' => 'fa fa-check',
                                'text' => 'Duis aute irure dolor in reprehenderit in voluptate velit.',
                            ],
                            [
                                'icon' => 'fa fa-check',
                                'text' => 'Ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                            ],
                        ],
                    ],
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } else {
            $this->command->info("Features tabbed section already seeded. Skipping.");
        }
    }
}
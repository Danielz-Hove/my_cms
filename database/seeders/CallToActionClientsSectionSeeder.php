<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CallToActionClientsSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $callToActionClientsSectionExists = DB::table('call_to_action_clients_sections')->exists();

        if (!$callToActionClientsSectionExists) {
            DB::table('call_to_action_clients_sections')->insert([
                'cta_headline' => 'Maecenas tempus tellus eget condimentum',  // Using the Text from OCR
                'cta_description' => 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Donec Donec velit neque, suscipit sit amet aliquam vel.',
                'cta_button_text' => 'Call To Action',  // Button Text
                'cta_button_url' => '/contact',
                'client_logos' => json_encode([
                    [
                        'logo' => 'images/lifegroups.png', // Placeholder logos
                    ],
                    [
                        'logo' => 'images/grabyo.png', // Placeholder logos
                    ],
                     [
                        'logo' => 'images/citrus.png', // Placeholder logos
                    ],
                     [
                        'logo' => 'images/trustly.png', // Placeholder logos
                    ],
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
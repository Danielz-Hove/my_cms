<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ContactSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contactSectionExists = DB::table('contact_sections')->exists();

        if (!$contactSectionExists) {
            DB::table('contact_sections')->insert([
                'contact_title' => 'Contact',
                'contact_subtitle' => 'Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit.',
                'contact_sidebar_title' => 'Contact Info',
                'contact_paragraph' => 'Prassent sacies massia cousulls o pellentesque ness, egestas non essi. Vestibulum ante ipsum perilis.',
                'contact_features' => json_encode([
                    [
                        'icon' => 'fa fa-map-marker',
                        'heading' => 'Our Location',
                        'description' => 'A108 Adam Street New York, NY 535022',
                    ],
                    [
                        'icon' => 'fa fa-phone',
                        'heading' => 'Phone Number',
                        'description' => '+1 5555 98488 55',
                    ],
                    [
                        'icon' => 'fa fa-envelope',
                        'heading' => 'Email Address',
                        'description' => 'info@example.com contact@example.com',
                    ]
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
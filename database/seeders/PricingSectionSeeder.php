<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PricingSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pricingSectionExists = DB::table('pricing_sections')->exists();

        if (!$pricingSectionExists) {
            DB::table('pricing_sections')->insert([
                'pricing_title' => 'Pricing',
                'pricing_subtext' => 'Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit.',
                'pricing_plans' => json_encode([
                    [
                        'plan_heading' => 'Basic Plan',
                        'plan_amount' => '9.9', //From image
                        'plan_paragraph' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.',
                        'plan_features' => [
                            [
                                'feature_icon' => 'fa fa-check-circle',
                                'feature_text' => 'Duis aute irure dolor', //From image
                            ],
                            [
                                'feature_icon' => 'fa fa-check-circle',
                                'feature_text' => 'Excepteur sint occaecat', //From image
                            ],
                            [
                                'feature_icon' => 'fa fa-check-circle',
                                'feature_text' => 'Nemo enim ipsam voluptatem', //From image
                            ],
                        ],
                        'plan_button_text' => 'Buy Now', // From image
                        'plan_button_url' => '/signup',
                    ],
                    [
                        'plan_heading' => 'Standard Plan', // From Image
                        'plan_amount' => '19.9',  // From Image
                        'plan_paragraph' => 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum.',
                        'plan_features' => [
                            [
                                'feature_icon' => 'fa fa-check-circle',
                                'feature_text' => 'Lorem ipsum dolor sit amet', //From image
                            ],
                            [
                                'feature_icon' => 'fa fa-check-circle',
                                'feature_text' => 'consectetur adipiscing elit', //From image
                            ],
                            [
                                'feature_icon' => 'fa fa-check-circle',
                                'feature_text' => 'sed do eiusmod tempor', //From image
                            ],
                             [
                                'feature_icon' => 'fa fa-check-circle',
                                'feature_text' => 'Ut labore et dolore magna', //From image
                            ],
                        ],
                        'plan_button_text' => 'Buy Now', // From image
                        'plan_button_url' => '/upgrade',
                    ],

                     [
                        'plan_heading' => 'Premium Plan', // From Image
                        'plan_amount' => '39.9',  // From Image
                        'plan_paragraph' => 'Quis autem vel eum iure reprehenderit in qui in voluptate velit esse quam nihil molestiae consequatur.',
                        'plan_features' => [
                            [
                                'feature_icon' => 'fa fa-check-circle',
                                'feature_text' => 'Temporibus autem et quibusdam', //From image
                            ],
                            [
                                'feature_icon' => 'fa fa-check-circle',
                                'feature_text' => 'Saepe eveniet ut et voluptates', //From image
                            ],
                            [
                                'feature_icon' => 'fa fa-check-circle',
                                'feature_text' => 'Nam libero tempore dolores', //From image
                            ],
                             [
                                 'feature_icon' => 'fa fa-check-circle',
                                 'feature_text' => 'Quisque nihil impedit ocas', //From image
                             ],
                             [
                                 'feature_icon' => 'fa fa-check-circle',
                                 'feature_text' => 'Maxime placeat facere passimus', //From image
                             ],
                        ],
                        'plan_button_text' => 'Buy Now', // From image
                        'plan_button_url' => '/upgrade',
                    ],
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
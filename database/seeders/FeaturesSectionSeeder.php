<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class FeaturesSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $featuresSectionExists = DB::table('features_sections')->exists();

        if (!$featuresSectionExists) {
            DB::table('features_sections')->insert([
                'features' => json_encode([
                    [
                        'icon' => 'fa fa-lightbulb', // from image
                        'heading' => 'Corporis voluptates',
                        'text' => 'Lorem ipsum dolor sit amet, consectetur',
                    ],
                    [
                        'icon' => 'fa fa-check-circle', // from image
                        'heading' => 'Explicabo consectetur',
                        'text' => 'Est enim dicta ut quasi architecto. Sed quia voluptas sit qui inventore',
                    ],
                    [
                        'icon' => 'fa fa-tree', // from image
                        'heading' => 'Ullamco laboris',
                        'text' => 'Excepteur sint occaecat cupidata qui officia deserunt in culpa cui officia deserunt',
                    ],
                    [
                        'icon' => 'fa fa-shield', // from image
                        'heading' => 'Labore consequatur',
                        'text' => 'Nam libero tempore dolores',
                    ],
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
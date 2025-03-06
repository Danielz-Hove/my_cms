<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ServicesSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $servicesSectionExists = DB::table('services_sections')->exists();

        if (!$servicesSectionExists) {
            DB::table('services_sections')->insert([
                'services_title' => 'Services', //From image
                'services_subtext' => 'Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit.',
                'service_cards' => json_encode([
                    [
                        'card_image' => 'fa fa-bar-chart', // from image
                        'card_title' => 'Nesciunt Mete',
                        'card_description' => "Provident nihil eius qui consequatur non omnis maiores. Eos accusantium dolores cumque perferendis tempore et consequatur.",
                        'card_button_text' => 'Read More', //from image
                        'card_button_url' => '/services',
                    ],
                    [
                        'card_image' => 'fa fa-code-fork',  // from image
                        'card_title' => 'Eosle Commodi',
                        'card_description' => 'Ut autem aut autem non a. Sint sint sit facilis nam iusto sint. Libero corrupti neque eum hic non ut nesciunt dolorem.',
                        'card_button_text' => 'Read More', //from image
                        'card_button_url' => '/services',
                    ],
                     [
                        'card_image' => 'fa fa-shopping-cart', // from image
                        'card_title' => 'Ledo Markt',
                        'card_description' => 'Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id voluptas adipisci eos earum corrupti.',
                        'card_button_text' => 'Read More', //from image
                        'card_button_url' => '/services',
                    ],
                    [
                        'card_image' => 'fa fa-line-chart', // from image
                        'card_title' => 'Asperiores Commodit',
                        'card_description' => 'Non et temporibus minus omnis sed dolor esse consequatur. Cupiditate sed error ea fuga sit provident adipisci neque.',
                        'card_button_text' => 'Read More', //from image
                        'card_button_url' => '/services',
                    ],
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
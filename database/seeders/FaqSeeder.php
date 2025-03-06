<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faqSectionExists = DB::table('faqs')->exists();

        if (!$faqSectionExists) {
            DB::table('faqs')->insert([
                'faq_section_heading' => 'Have a question? Check out the FAQ',
                'faq_short_description' => 'Mensmium telus eget condimentum rhoncus sem quam semper libero sit amet adipiscing sem neque sod ipsum.',
                'faq_cta_button_text' => 'Lorem Ipsum', //
                'faq_cta_short_description' => 'Dam dolore ir representarit in voluptate cum dolore cula qualogo qui cula offies deserunts molliti anim id est laborum.',
                'faq_cta_button_url' => '/contact',
                'faq_accordion' => json_encode([
                    [
                        'question_title' => 'Non nam consectetur al aim at lamlibus ambs duls?',
                        'answer_text' => "Faugiat pretium tibim sipsum consequ. Tempus laculis urna at volupat laces leones non custubir gravida. Venerables facilis magna fringilla urna porttitor rhoncus dolor purus rien.",
                    ],
                    [
                        'question_title' => 'Fauglet scolorique varies morbi enim nunc faucibus?',
                        'answer_text' => 'lorem',
                    ],
                     [
                        'question_title' => 'Dolor sit amet consectetur adipiscit pollmoso?',
                        'answer_text' => 'lorem',
                    ],
                     [
                        'question_title' => 'Au salis tempor diapels. Aliquam eleifend nil in multa?',
                        'answer_text' => 'lorem',
                    ],

                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
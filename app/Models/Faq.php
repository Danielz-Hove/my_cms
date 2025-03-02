<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_title',
        'answer_text',
        'faq_cta_short_description',
        'faq_cta_button_text',
        'faq_cta_button_url',
        'faq_section_heading',
        'faq_short_description',
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;

class Faq extends Model
{
    use HasFactory;

    protected $fillable = [
        'faq_section_heading',
        'faq_short_description',
        'faq_accordion',
        'faq_cta_short_description',
        'faq_cta_button_text',
        'faq_cta_button_url',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'faq_accordion' => 'array',
    ];
}
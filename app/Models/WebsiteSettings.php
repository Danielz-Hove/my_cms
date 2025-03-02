<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteSettings extends Model
{
    protected $fillable = [
        'navbar_logo_text',
        'navbar_logo_image',
        'navbar_links',
        'navbar_button_text',
        'footer_logo_text',
        'footer_logo_image',
        'footer_address',
        'footer_phone',
        'footer_email',
        'footer_social_icons',
        'footer_copyright',
    ];

    protected $casts = [
        'navbar_links' => 'array',
        'footer_social_icons' => 'array',
    ];
}
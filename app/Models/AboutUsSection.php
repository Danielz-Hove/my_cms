<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUsSection extends Model
{
    use HasFactory;

    protected $fillable = [ // Add the about_us_iconlist to fillable
        'page_slug',
        'page_title',
        'page_status',
        'page_meta_description',
        'page_meta_keywords',
        'about_us_subheading',
        'about_us_title',
        'about_us_description',
        'about_us_meeting_image',
        'experience_years',
        'experience_text',
        'experience_description',
        'about_us_features',
        'about_us_iconlist' // Add this line
    ];

    protected $casts = [
        'about_us_features' => 'array',
        'about_us_iconlist' => 'array' // Add this line
    ];
}
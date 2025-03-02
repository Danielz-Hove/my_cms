<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_slug', // Add page_slug to connect sections to pages
        'page_title', // Add a page title
        'page_status', // Add a page status
        'page_meta_description', //Add meta information
        'page_meta_keywords', //Add meta information
        'hero_title',
        'hero_subtitle',
        'hero_subtitle_icon',
        'hero_description',
        'hero_button_text',
        'hero_button_url',
        'hero_video_url',
        'hero_background_image',
        'hero_foreground_image',
    ];
}
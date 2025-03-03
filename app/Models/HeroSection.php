<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_slug',
        'page_title',
        'page_status',
        'page_meta_description',
        'page_meta_keywords',
        'hero_title',
        'hero_subtitle',
        'hero_subtitle_icon',
        'hero_description',
        'hero_button_text',
        'hero_button_url',
        'hero_video_url',
        'hero_background_image',
        'hero_foreground_image',
        'hero_features', // Add this
    ];

    protected $casts = [
        'hero_features' => 'array', // Cast hero_features to array
    ];
}
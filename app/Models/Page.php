<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'status',
        'meta_description',
        'meta_keywords',
        'hero_title',
        'hero_subtitle', // Add this
        'hero_subtitle_icon', // Add this
        'hero_description',
        'hero_button_text',
        'hero_button_url',
        'hero_video_url',
        'hero_background_image',
        'hero_foreground_image',
        'features',
        'content',
    ];

    protected $casts = [
        'features' => 'array', // Keep this or add if not already defined.  Important for the repeater.
    ];
}
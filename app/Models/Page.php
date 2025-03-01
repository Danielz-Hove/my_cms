<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'hero_subtitle',
        'hero_subtitle_icon',
        'hero_description',
        'hero_button_text',
        'hero_button_url',
        'hero_video_url',
        'hero_background_image',
        'hero_foreground_image',
        'content',
        'features_headline',
        'features_subheading',
    ];

    public function tabbedFeatures(): HasMany
    {
        return $this->hasMany(TabbedFeature::class);
    }
}
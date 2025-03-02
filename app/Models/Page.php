<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'status',
        'meta_description',
        'meta_keywords',
        'content',
        'hero_title',
        'hero_subtitle',
        'hero_subtitle_icon',
        'hero_description',
        'hero_button_text',
        'hero_button_url',
        'hero_video_url',
        'hero_background_image',
        'hero_foreground_image',
        'features',
        'features_headline',
        'features_subheading',
        'cta_headline',
        'cta_description',
        'cta_button_text',
        'cta_button_url',
        'client_logos',
        'services_title',
        'services_subtext',
        'service_cards',
        'pricing_title',
        'pricing_subtext',
        'pricing_plans',
        'about_us_sections',
    ];

    protected $casts = [
        'features' => 'array',
        'client_logos' => 'array',
        'service_cards' => 'array',
        'pricing_plans' => 'array',
        'about_us_sections' => 'array',
    ];

    public function tabbedFeatures(): HasMany
    {
        return $this->hasMany(TabbedFeature::class);
    }
    public function testimonials(): HasMany
    {
        return $this->hasMany(Testimonial::class);
    }
    public function statistics(): HasMany
    {
        return $this->hasMany(Statistic::class);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;

        if (empty($this->attributes['slug'])) {
            $this->attributes['slug'] = Str::slug($value);
        }
    }
}
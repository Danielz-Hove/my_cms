<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\TabbedFeature;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'status', 'meta_description', 'meta_keywords',
        'hero_title', 'hero_subtitle', 'hero_subtitle_icon', 'hero_description',
        'hero_button_text', 'hero_button_url', 'hero_video_url', 'hero_background_image',
        'hero_foreground_image', 'content',
        'features', 'about_us_sections', 'features_headline', 'features_subheading',
        'cta_headline', 'cta_description', 'cta_button_text', 'cta_button_url',
        'client_logos',
    ];

    protected $casts = [
        'client_logos' => 'array', //or 'json' depending on your requirements
    ];
    public function tabbedFeatures(): HasMany  // This is the crucial part!
    {
        return $this->hasMany(TabbedFeature::class);
    }
}
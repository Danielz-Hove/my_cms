<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class WebsiteSettings extends Model
{
    protected $casts = [
        'navbar_links' => 'array',
        'footer_social_icons' => 'array',
        'contact_sections' => 'array', // Add this!
    ];

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
        'contact_sections', // Add this!
    ];

    // Optional: Mutator for accessing the navbar_logo_image URL.  Only needed if your
    // images are stored outside the public directory.
    public function getNavbarLogoImageUrlAttribute()
    {
        if ($this->navbar_logo_image) {
            return Storage::url($this->navbar_logo_image);
        }
        return null;
    }

    public function getFooterLogoImageUrlAttribute()
    {
        if ($this->footer_logo_image) {
            return Storage::url($this->footer_logo_image);
        }
        return null;
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUsSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_slug',
        'about_us_subheading',
        'about_us_title',
        'about_us_description',
        'about_us_meeting_image',
        'experience_years',
        'experience_description',
        'about_us_features',
        'about_us_iconlist',
        'page_status',
    ];

    protected $casts = [
        'about_us_features' => 'array',
        'about_us_iconlist' => 'array',
    ];
}
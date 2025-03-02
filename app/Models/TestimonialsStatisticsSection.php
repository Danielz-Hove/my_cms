<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestimonialsStatisticsSection extends Model
{
    protected $table = 'testimonials_statistics_sections'; // Explicitly define the table name (optional, but good practice)

    protected $fillable = [
        'page_slug',
        'page_title',
        'page_status',
        'page_meta_description',
        'page_meta_keywords',
        'title', // added
        'subtext',  // added
        'testimonials',
        'statistics',
    ];

    protected $casts = [
        'testimonials' => 'array', // Cast the 'testimonials' column to an array
        'statistics'  => 'array', // Cast the 'statistics' column to an array
    ];
}
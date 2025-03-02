<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeaturesSection extends Model
{
    protected $fillable = [
        'page_slug',
        'page_title',
        'page_status',
        'page_meta_description',
        'page_meta_keywords',
        'features', // Add 'features' to the $fillable array
    ];

    protected $casts = [
        'features' => 'array', // Cast 'features' to an array
    ];
}
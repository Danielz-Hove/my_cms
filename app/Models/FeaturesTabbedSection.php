<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturesTabbedSection extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'features_tabbed_sections';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'page_slug',
        'page_title',
        'page_status',
        'page_meta_description',
        'page_meta_keywords',
        'features_headline',
        'features_subheading',
        'tabs', // Added 'tabs' to the fillable array
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'tabs' => 'array', // Cast 'tabs' to an array for easy access
    ];
}
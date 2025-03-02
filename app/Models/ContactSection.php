<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactSection extends Model
{
    use HasFactory;

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
        'contact_title',
        'contact_subtitle',
        'contact_sidebar_title',
        'contact_paragraph',
        'contact_features',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'contact_features' => 'array',
    ];
}
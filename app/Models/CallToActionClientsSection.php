<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallToActionClientsSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_slug',
        'page_title',
        'page_status',
        'page_meta_description',
        'page_meta_keywords',
        'cta_headline',
        'cta_description',
        'cta_button_text',
        'cta_button_url',
        'client_logos', // Store Client Logos as JSON, you may want to create individual models for that
    ];
}
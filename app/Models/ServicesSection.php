<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicesSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_slug',
        'page_title',
        'page_status',
        'page_meta_description',
        'page_meta_keywords',
        'services_title',
        'services_subtext',
        'service_cards', // Add this line!
    ];

    protected $casts = [
        'service_cards' => 'array', // Or 'json'
    ];
}
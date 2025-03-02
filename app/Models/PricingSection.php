<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PricingSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_slug',
        'page_title',
        'page_status',
        'page_meta_description',
        'page_meta_keywords',
        'pricing_title',
        'pricing_subtext',
        'pricing_plans'
    ];
    protected $casts = [
        'pricing_plans' => 'array',
    ];
}
<?php
// app/Models/Testimonial.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_id',
        'testimonial_icon',
        'testimonial_title',
        'testimonial_subtitle',
        'testimonial_stars',
        'testimonial_paragraph',
    ];

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }
}
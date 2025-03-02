<?php
// app/Models/Statistic.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Statistic extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_id',
        'statistic_number',
        'statistic_text',
    ];

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }
}
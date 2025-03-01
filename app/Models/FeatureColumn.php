<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FeatureColumn extends Model
{
    use HasFactory;

    protected $fillable = [
        'tabbed_feature_id',
        'column_icon',
        'column_heading',
        'column_paragraph',
    ];

    public function tabbedFeature(): BelongsTo
    {
        return $this->belongsTo(TabbedFeature::class);
    }
}
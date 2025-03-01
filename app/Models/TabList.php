<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TabList extends Model
{
    use HasFactory;

    protected $fillable = [
        'tabbed_feature_id',
        'tab_list_icon',
        'tab_list_text',
        'tab_image',
    ];

    public function tabbedFeature(): BelongsTo
    {
        return $this->belongsTo(TabbedFeature::class);
    }
}
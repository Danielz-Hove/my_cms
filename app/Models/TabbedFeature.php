<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TabbedFeature extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_id',
        'tab_headline',
    ];

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }

    public function featureColumns(): HasMany
    {
        return $this->hasMany(FeatureColumn::class);
    }

    public function tabList(): HasOne
    {
        return $this->hasOne(TabList::class);
    }
}
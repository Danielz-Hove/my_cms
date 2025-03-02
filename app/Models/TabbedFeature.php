<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TabbedFeature extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_id', 'tab_headline', // Add other fillable fields
    ];

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }

    public function tabList(): HasMany
    {
        return $this->hasMany(TabList::class);
    }

    public function featureColumns(): HasMany
    {
        return $this->hasMany(FeatureColumn::class);
    }
}
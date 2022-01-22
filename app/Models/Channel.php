<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Channel extends Model implements HasMedia
{
    use HasFactory, HasMediaTrait;

    public function user(): BelongsTo
    {
        return $this->belongsTo(Channel::class);
    }

    public function image()
    {
        return $this->media->first() ? $this->media->first()->getFullUrl('thumb') : null;
    }

    public function editable()
    {
        return auth()->check() ? $this->user_id === auth()->user()->id : false;
    }

    public function registerMediaConversions(?Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(100)
            ->height(100);
    }

    /**
     * Get all of the subscriptions for the Channel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class, 'channel_id', 'id');
    }
}

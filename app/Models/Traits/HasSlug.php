<?php

namespace App\Models\Traits;

use Spatie\Sluggable\HasSlug as HasSpatieSlug;
use Spatie\Sluggable\SlugOptions;

trait HasSlug
{
    use HasSpatieSlug;

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom($this->generateSlugsFrom ?? 'name')
            ->saveSlugsTo('slug');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

}

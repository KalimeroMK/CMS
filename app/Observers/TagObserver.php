<?php

namespace App\Observers;

use App\Models\Tag;
use Illuminate\Support\Str;

class TagObserver
{
    /**
     * Handle the tag "created" event.
     *
     * @param Tag $tag
     */
    public function creating(Tag $tag)
    {
        $tag->slug = Str::slug($tag->title);
    }

    /**
     * Handle the tag "updated" event.
     *
     * @param Tag $tag
     */
    public function updated(Tag $tag)
    {
        $tag->slug = Str::slug($tag->title);

    }

    /**
     * Handle the tag "deleted" event.
     *
     * @param Tag $tag
     */
    public function deleted(Tag $tag)
    {
        //
    }

    /**
     * Handle the tag "restored" event.
     *
     * @param Tag $tag
     */
    public function restored(Tag $tag)
    {
        //
    }

    /**
     * Handle the tag "force deleted" event.
     *
     * @param Tag $tag
     */
    public function forceDeleted(Tag $tag)
    {
        //
    }
}
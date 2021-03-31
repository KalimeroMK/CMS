<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Str;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     *
     * @param Post $post
     * @return void
     */
    public function creating(Post $post)
    {
        $post->slug = Str::slug(array_first($post->title));
    }

    /**
     * Handle the Post "updated" event.
     *
     * @param Post $post
     * @return void
     */
    public function updated(Post $post)
    {
        $post->slug = Str::slug(array_first($post->title));
    }
}

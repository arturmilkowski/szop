<?php

namespace App\Listeners\Blog;

use App\Events\CommentApproved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;

class ClearPostCache
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    // public function __construct() {}

    /**
     * Handle the event.
     *
     * @param CommentApproved $event Event
     * 
     * @return void
     */
    public function handle(CommentApproved $event): void
    {
        $key = 'post' . $event->comment->post->id;
        Cache::forget($key);  // exactly the post
        // Cache::forget('posts');
    }
}

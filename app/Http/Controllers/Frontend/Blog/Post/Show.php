<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend\Blog\Post;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Blog\Post;
use Illuminate\Support\Facades\Cache;

class Show extends Controller
{
    const SECONDS = 60 * 60 * 12;

    /**
     * Show post.
     *
     * @param Post $post Post
     * 
     * @return View
     */
    public function __invoke(Post $post): View
    {
        $key = 'post' . $post->id;

        if (Cache::has($key)) {
            $post = Cache::get($key);
        } else {
            $post = Post::with(['tags', 'comments'])->find($post->id);
            Cache::put($key, $post, self::SECONDS);
        }

        // $comments = $post->comments()->approved()->get();
        $currentRouteName = 'frontend.blog';

        return view(
            'frontend.blog.post.show',
            compact('post', 'currentRouteName')  // 'comments'
        );
    }
}

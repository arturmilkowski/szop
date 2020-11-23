<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend\Blog\Post;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Blog\Post;
use Illuminate\Support\Facades\Cache;

class Index extends Controller
{
    const SECONDS = 60 * 60 * 12;

    /**
     * Index blog page.
     *
     * @return View
     */
    public function __invoke(): View
    {
        $posts = Cache::remember(
            'posts',
            self::SECONDS,
            function () {
                return Post::published()->orderBy('created_at', 'desc')->get();
            }
        );
        $currentRouteName = 'frontend.blog';

        return view(
            'frontend.blog.post.index',
            compact('posts', 'currentRouteName')
        );
    }
}

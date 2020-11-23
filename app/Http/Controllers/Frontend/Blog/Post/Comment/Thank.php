<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend\Blog\Post\Comment;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use Illuminate\View\View;
// use App\Models\Blog\{Post, Comment};
// use Illuminate\Support\Facades\Cache;

class Thank extends Controller
{
    /**
     * Thank for sent comment.
     *
     * @return Object View|RedirectResponse
     */
    public function __invoke(): Object
    {
        // return __FUNCTION__;
        if (session()->exists('comment_sent')) {
            $currentRouteName = 'frontend.blog';
            return view(
                'frontend.blog.post.comment.thank',
                compact('currentRouteName')
            );
        }

        return redirect()->route('frontend.pages.index');
    }
}

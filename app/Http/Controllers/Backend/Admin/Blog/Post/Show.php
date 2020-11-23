<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\Admin\Blog\Post;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;
use App\Models\Blog\Post;

class Show extends Controller
{
    /**
     * Show post.
     *
     * @param Post $post Post
     * 
     * @return View
     */
    public function __invoke(Post $post): View
    {
        Gate::authorize('admin');

        $currentRouteName = 'backend.admins.blogs';

        return view(
            'backend.admin.blog.post.show',
            compact('post', 'currentRouteName')
        );
    }
}

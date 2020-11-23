<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\Admin\Blog\Post;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;
// use App\Models\Blog\Post;
use Illuminate\Support\Facades\DB;

class Index extends Controller
{
    /**
     * Post index.
     *
     * @return View
     */
    public function __invoke(): View
    {
        Gate::authorize('admin');

        $posts = DB::table('posts')
            ->orderBy('created_at', 'desc')
            ->simplePaginate(10);

        $currentRouteName = 'backend.admins.blogs';

        return view(
            'backend.admin.blog.post.index',
            compact('posts', 'currentRouteName')
        );
    }
}

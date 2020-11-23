<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\Admin\Blog\Post;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;
use App\Models\Blog\Tag;

class Create extends Controller
{
    /**
     * Create post form.
     *
     * @return View
     */
    public function __invoke(): View
    {
        Gate::authorize('admin');

        $tags = Tag::all();
        $currentRouteName = 'backend.admins.blogs';

        return view(
            'backend.admin.blog.post.create',
            compact('tags', 'currentRouteName')
        );
    }
}

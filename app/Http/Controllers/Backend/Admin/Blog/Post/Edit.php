<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\Admin\Blog\Post;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;
// use App\Services\Upload;
use App\Models\Blog\{Post, Tag};

class Edit extends Controller
{
    /**
     * Edit post.
     *
     * @param Post $post Post
     * 
     * @return View
     */
    public function __invoke(Post $post): View
    {
        Gate::authorize('admin');

        $tags = Tag::all();
        $currentRouteName = 'backend.admins.blogs';

        return view(
            'backend.admin.blog.post.edit',
            compact('post', 'tags', 'currentRouteName')
        );
    }
}

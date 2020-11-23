<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\Admin\Blog\Comment;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;
use App\Models\Blog\Comment;

class Edit extends Controller
{
    /**
     * Edit.
     *
     * @param Comment $comment Comment
     * 
     * @return View
     */
    public function __invoke(Comment $comment): View
    {
        Gate::authorize('admin');

        $currentRouteName = 'backend.admins.blogs';

        return view(
            'backend.admin.blog.comment.edit',
            compact('comment', 'currentRouteName')
        );
    }
}

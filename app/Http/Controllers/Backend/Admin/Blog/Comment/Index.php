<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\Admin\Blog\Comment;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
// use App\Models\Blog\Comment;

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

        $comments = DB::table('comments')->orderBy('created_at', 'desc')->get();
        $currentRouteName = 'backend.admins.blogs';

        return view(
            'backend.admin.blog.comment.index',
            compact('comments', 'currentRouteName')
        );
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\Admin\Blog\Tag;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;
use App\Models\Blog\Tag;

class Index extends Controller
{
    /**
     * Tag index.
     *
     * @return View
     */
    public function __invoke(): View
    {
        Gate::authorize('admin');

        $tags = Tag::all();
        $currentRouteName = 'backend.admins.blogs';

        return view(
            'backend.admin.blog.tag.index',
            compact('tags', 'currentRouteName')
        );
    }
}

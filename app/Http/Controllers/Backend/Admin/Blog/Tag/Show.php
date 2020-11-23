<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\Admin\Blog\Tag;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;
use App\Models\Blog\Tag;

class Show extends Controller
{
    /**
     * Show tag.
     *
     * @param Tag $tag Tag
     * 
     * @return View
     */
    public function __invoke(Tag $tag): View
    {
        Gate::authorize('admin');

        $currentRouteName = 'backend.admins.blogs';

        return view(
            'backend.admin.blog.tag.show',
            compact('tag', 'currentRouteName')
        );
    }
}

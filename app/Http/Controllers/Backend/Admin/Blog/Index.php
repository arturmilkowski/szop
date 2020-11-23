<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\Admin\Blog;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;

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

        $currentRouteName = 'backend.admins.blogs';

        return view(
            'backend.admin.blog.index',
            compact('currentRouteName')
        );
    }
}

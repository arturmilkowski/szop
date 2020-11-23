<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\Admin\Blog\Tag;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;

class Create extends Controller
{
    /**
     * Create tag form.
     *
     * @return View
     */
    public function __invoke(): View
    {
        Gate::authorize('admin');

        $currentRouteName = 'backend.admins.blogs';

        return view('backend.admin.blog.tag.create', compact('currentRouteName'));
    }
}

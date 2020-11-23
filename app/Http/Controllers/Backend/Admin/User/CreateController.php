<?php

namespace App\Http\Controllers\Backend\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;

class CreateController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function __invoke(): View
    {
        Gate::authorize('admin');

        $currentRouteName = 'backend.admins.users';

        return view('backend.admin.user.create', compact('currentRouteName'));
    }
}

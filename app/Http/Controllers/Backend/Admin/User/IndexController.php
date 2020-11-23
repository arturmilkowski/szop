<?php

namespace App\Http\Controllers\Backend\Admin\User;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;
use App\User;

class IndexController extends Controller
{
    /**
     * Display a listing of the users.
     * 
     * @return View
     */
    public function __invoke(): View
    {
        Gate::authorize('admin');

        $users = User::orderBy('created_at', 'desc')->get();
        $currentRouteName = 'backend.admins.users';

        return view(
            'backend.admin.user.index',
            compact('users', 'currentRouteName')
        );
    }
}

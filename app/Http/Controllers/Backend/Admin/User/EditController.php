<?php

namespace App\Http\Controllers\Backend\Admin\User;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;
use App\User;

class EditController extends Controller
{
    /**
     * Show the form for editing user.
     *
     * @param User $user User
     * 
     * @return View
     */
    public function __invoke(User $user): View
    {
        Gate::authorize('admin');
        
        $currentRouteName = 'backend.admins.users';

        return view('backend.admin.user.edit', compact('user', 'currentRouteName'));
    }
}

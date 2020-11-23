<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\User\Profile\Password;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class Edit extends Controller
{
    /**
     * Show the form for editing user's password.
     *
     * @param Request $request Request
     * 
     * @return View
     */
    public function __invoke(Request $request): View
    {
        $user = $request->user();
        $profile = $request->user()->profile;

        $this->authorize('update', $profile);

        $currentRouteName = 'backend.users.profiles';

        return view(
            'backend.user.profile.password.edit',
            compact('user', 'profile', 'currentRouteName')
        );
    }
}

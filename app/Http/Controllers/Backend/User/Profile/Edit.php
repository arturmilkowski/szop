<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\User\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Voivodeship;

class Edit extends Controller
{
    /**
     * Show the form for editing the profile.
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

        $voivodeships = Voivodeship::all();
        $currentRouteName = 'backend.users.profiles';

        return view(
            'backend.user.profile.edit',
            compact('user', 'profile', 'voivodeships', 'currentRouteName')
        );
    }
}

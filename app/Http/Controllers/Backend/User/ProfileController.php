<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\User\StoreProfileRequest;

class ProfileController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreProfileRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $request->user()->profile->update($validated);

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
}

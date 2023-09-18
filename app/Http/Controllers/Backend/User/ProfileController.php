<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\StoreProfileRequest;

class ProfileController extends Controller
{
    public function show(): View
    {
        $user = Auth::user();

        return view('backend.user.profile.show', ['item' => $user]);
    }

    public function update(StoreProfileRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $request->user()->profile->update($validated);

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
}

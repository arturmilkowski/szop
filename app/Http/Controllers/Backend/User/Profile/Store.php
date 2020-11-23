<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\User\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreProfile;
use Illuminate\Http\Request;


class Store extends Controller
{
    /**
     * Store a newly created profile in storage.
     *
     * @param StoreProfile $request Validation
     * 
     * @return RedirectResponse
     */
    public function __invoke(StoreProfile $request): RedirectResponse
    {
        $validated = $request->validated();
        $user = $request->user();
        $profile = $user->profile()->create($validated);

        return redirect()
            ->route('backend.users.profiles.show', [$profile->id])
            ->with('alert', config('settings.ui.backend.alerts.success'))
            ->with('message', config('settings.ui.backend.messages.added'));
    }
}

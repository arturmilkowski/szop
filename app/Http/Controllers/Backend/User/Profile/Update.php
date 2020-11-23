<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\User\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreProfile;
use App\Models\Profile;

class Update extends Controller
{
    /**
     * Update the profile in storage.
     *
     * @param StoreProfile $request Requests     
     * @param Profile      $profile Profile
     *
     * @return RedirectResponse
     */
    public function __invoke(
        StoreProfile $request,
        Profile $profile
    ): RedirectResponse {
        $this->authorize('update', $profile);

        $validated = $request->validated();
        $user = $request->user();
        $user->update($validated);
        $profile->update($validated);

        $userWasChanged = $user->wasChanged();
        $profileWasChanged = $profile->wasChanged();

        $message = config('settings.ui.backend.messages.not_changed');
        $alert = config('settings.ui.backend.alerts.warning');

        if ($userWasChanged || $profileWasChanged) {
            $message = config('settings.ui.backend.messages.changed');
            $alert = config('settings.ui.backend.alerts.success');
        }

        return redirect()
            ->route('backend.users.profiles.show', [$profile->id])
            ->with('alert', $alert)
            ->with('message', $message);
    }
}

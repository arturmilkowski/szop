<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\User\Profile\Password;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StorePassword;
use App\Models\Profile;


class Update extends Controller
{
    /**
     * Change user's password.
     *
     * @param StorePassword $request Request
     * @param Profile       $profile Profile
     * 
     * @return RedirectResponse
     */
    public function __invoke(
        StorePassword $request,
        Profile $profile
    ): RedirectResponse {
        $this->authorize('update', $profile);
        $validated = $request->validated();

        $request->user()->update(['password' => Hash::make($validated['password'])]);
        // it always changed when validation passing
        return redirect()
            ->route('backend.users.profiles.show', [$profile->id])
            ->with('alert', config('settings.ui.backend.alerts.success'))
            ->with('message', config('settings.ui.backend.messages.changed'));
    }
}

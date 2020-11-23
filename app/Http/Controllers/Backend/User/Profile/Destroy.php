<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend\User\Profile;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class Destroy extends Controller
{
    /**
     * Remove the profile from storage.
     *
     * @param Request $request Request
     * @param Profile $profile Profile
     * 
     * @return object View | RedirectResponse
     */
    public function __invoke(Request $request, Profile $profile): object
    {
        $this->authorize('delete', $profile);

        $answer = $request->input('delete');

        $currentRouteName = 'backend.users.profiles';

        $message = config('settings.ui.backend.messages.not_removed');
        $alert = config('settings.ui.backend.alerts.warning');

        if ($answer == 'Yes') {
            $deleted = $profile->delete();

            if ($deleted) {
                $message = config('settings.ui.backend.messages.removed');
                $alert = config('settings.ui.backend.alerts.success');
            }
    
            return redirect()
                ->route('backend.users.index')
                ->with('alert', $alert)
                ->with('message', $message);
        }

        return view(
            'backend.user.profile.destroy',
            compact('profile', 'currentRouteName')
        );
    }
}

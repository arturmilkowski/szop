<?php

namespace App\Http\Controllers\Backend\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Http\RedirectResponse;
use App\User;

class DestroyController extends Controller
{
    /**
     * Remove the user from storage.
     *
     * @param Request $request Request
     * @param User    $user    User
     * 
     * @return object View | RedirectResponse
     */
    public function __invoke(Request $request, User $user): object
    {
        // Gate::authorize('admin');

        $answer = $request->input('delete');

        $message = config('settings.ui.backend.messages.not_removed');
        $alert = config('settings.ui.backend.alerts.warning');
        $currentRouteName = 'backend.admins.users';

        if ($answer == 'Yes') {
            $deleted = $user->delete();

            if ($deleted) {
                $message = config('settings.ui.backend.messages.removed');
                $alert = config('settings.ui.backend.alerts.success');
            }
    
            return redirect()
                ->route('backend.admins.users.index')
                ->with('alert', $alert)
                ->with('message', $message);
        }

        return view(
            'backend.admin.user.destroy', compact('user', 'currentRouteName')
        );
    }
}

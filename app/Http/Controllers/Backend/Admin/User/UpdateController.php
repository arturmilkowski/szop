<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend\Admin\User;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UpdateUser;
use App\User;

class UpdateController extends Controller
{
    /**
     * Update the user in storage.
     *
     * @param UpdateUser $request Validation
     * @param User       $user    User
     * 
     * @return RedirectResponse
     */
    public function __invoke(UpdateUser $request, User $user): RedirectResponse {
        Gate::authorize('admin');

        $validated = $request->validated();

        Validator::make(
            $validated, [
                'email' => [
                    Rule::unique('users')->ignore($user)
                ]
            ]
        );

        $message = config('settings.ui.backend.messages.not_changed');
        $alert = config('settings.ui.backend.alerts.warning');

        $user->update($validated);

        if ($user->wasChanged()) {
            $message = config('settings.ui.backend.messages.changed');
            $alert = config('settings.ui.backend.alerts.success');
        }

        return redirect()
            ->route('backend.admins.users.show', [$user->id])
            ->with('alert', $alert)
            ->with('message', $message);
    }
}

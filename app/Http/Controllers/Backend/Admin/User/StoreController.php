<?php

namespace App\Http\Controllers\Backend\Admin\User;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use App\User;
use App\Http\Requests\StoreUser;

class StoreController extends Controller
{
    /**
     * Store a newly created user in storage.
     *
     * @param StoreUser $request Validation
     * 
     * @return RedirectResponse
     */
    public function __invoke(StoreUser $request): RedirectResponse
    {
        Gate::authorize('admin');

        $validated = $request->validated();

        User::create($validated);

        return redirect()
            ->route('backend.admins.users.index')
            ->with('alert', config('settings.ui.backend.alerts.success'))
            ->with('message', config('settings.ui.backend.messages.added'));
    }
}

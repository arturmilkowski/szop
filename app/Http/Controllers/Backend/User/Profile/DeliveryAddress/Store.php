<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend\User\Profile\DeliveryAddress;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Models\Profile;
use App\Http\Requests\StoreDeliveryAddress;

class Store extends Controller
{
    /**
     * Store a newly created delivery address in storage.
     *
     * @param StoreDeliveryAddress $request Validation
     * @param Profile              $profile Profile
     * 
     * @return RedirectResponse
     */
    public function __invoke(
        StoreDeliveryAddress $request,
        Profile $profile
    ): RedirectResponse {
        $validated = $request->validated();

        $profile->deliveryAddress()->create($validated);  // DeliveryAddress

        return redirect()
            ->route('backend.users.profiles.show', [$profile->id])
            ->with('alert', config('settings.ui.backend.alerts.success'))
            ->with('message', config('settings.ui.backend.messages.added'));
    }
}

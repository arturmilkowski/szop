<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend\User\Profile\DeliveryAddress;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreDeliveryAddress;
use App\Models\{Profile, DeliveryAddress};

class Update extends Controller
{
    /**
     * Update the delivery address in storage.
     *
     * @param StoreDeliveryAddress $request         Validate
     * @param Profile              $profile         Profile
     * @param DeliveryAddress      $deliveryAddress Delivery address
     * 
     * @return RedirectResponse
     */
    public function __invoke(
        StoreDeliveryAddress $request,
        Profile $profile,
        DeliveryAddress $deliveryAddress
    ): RedirectResponse {
        $this->authorize('update', $deliveryAddress);
        
        $validated = $request->validated();

        $deliveryAddress->update($validated);
        
        $wasChanged = $deliveryAddress->wasChanged();
        
        $message = config('settings.ui.backend.messages.not_changed');
        $alert = config('settings.ui.backend.alerts.warning');

        if ($wasChanged) {
            $message = config('settings.ui.backend.messages.changed');
            $alert = config('settings.ui.backend.alerts.success');
        }

        return redirect()
            ->route(
                'backend.users.profiles.delivery_addresses.show',
                [$profile->id, $deliveryAddress->id]
            )
            ->with('alert', $alert)
            ->with('message', $message);
    }
}

<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend\User\Profile\DeliveryAddress;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Profile, DeliveryAddress};

class Destroy extends Controller
{
    /**
     * Remove the delivery address from storage.
     *
     * @param Request         $request         Validation
     * @param Profile         $profile         Profile
     * @param DeliveryAddress $deliveryAddress Delivery address
     * 
     * @return object View | RedirectResponse
     */
    public function __invoke(
        Request $request,
        Profile $profile,
        DeliveryAddress $deliveryAddress
    ): object {
        $this->authorize('delete', $deliveryAddress);

        $answer = $request->input('delete');

        $message = config('settings.ui.backend.messages.not_removed');
        $alert = config('settings.ui.backend.alerts.warning');
        $currentRouteName = 'backend.users.profiles';

        if ($answer == 'Yes') {
            $deleted = $deliveryAddress->delete();

            if ($deleted) {
                $message = config('settings.ui.backend.messages.removed');
                $alert = config('settings.ui.backend.alerts.success');
            }
    
            return redirect()
                ->route('backend.users.profiles.show', [$profile->id])
                ->with('alert', $alert)
                ->with('message', $message);
        }

        return view(
            'backend.user.profile.delivery_address.destroy',
            compact('profile', 'deliveryAddress', 'currentRouteName')
        );
    }
}

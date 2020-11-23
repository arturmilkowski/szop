<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend\User\Profile\DeliveryAddress;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\{Profile, DeliveryAddress};

class Show extends Controller
{
    /**
     * Display the delivery address.
     *
     * @param Request         $request         Request
     * @param Profile         $profile         Profile
     * @param DeliveryAddress $deliveryAddress Delivery address
     * 
     * @return View
     */
    public function __invoke(
        Request $request,
        Profile $profile,
        DeliveryAddress $deliveryAddress
    ): View {
        $user = $request->user();
        $profile = $user->profile;

        $this->authorize('view', $deliveryAddress);

        $currentRouteName = 'backend.users.profiles';

        return view(
            'backend.user.profile.delivery_address.show',
            compact('profile', 'deliveryAddress', 'currentRouteName')
        );
    }
}

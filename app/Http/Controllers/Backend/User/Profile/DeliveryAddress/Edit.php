<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend\User\Profile\DeliveryAddress;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\{Profile, DeliveryAddress};
use App\Models\Voivodeship;

class Edit extends Controller
{
    /**
     * Show the form for editing the delivery address.
     *
     * @param Profile         $profile         Profile
     * @param DeliveryAddress $deliveryAddress Delivery address
     * 
     * @return View
     */
    public function __invoke(
        Profile $profile,
        DeliveryAddress $deliveryAddress
    ): View {
        $this->authorize('update', $deliveryAddress);

        $voivodeships = Voivodeship::all();
        $currentRouteName = 'backend.users.profiles';

        return view(
            'backend.user.profile.delivery_address.edit',
            compact('profile', 'deliveryAddress', 'voivodeships', 'currentRouteName')
        );
    }
}

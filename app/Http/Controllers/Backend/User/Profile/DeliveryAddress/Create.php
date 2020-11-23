<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend\User\Profile\DeliveryAddress;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\{Voivodeship, Profile, DeliveryAddress};

class Create extends Controller
{
    /**
     * Show the form for creating a new delivery address.
     *
     * @param Request $request Request     
     * @param Profile $profile Profile
     * 
     * @return View
     */
    public function __invoke(Request $request, Profile $profile): View 
    {
        $user = $request->user();
        
        $this->authorize('create', DeliveryAddress::class);

        $voivodeships = Voivodeship::all();
        
        $currentRouteName = 'backend.users.profiles';
        
        return view(
            'backend.user.profile.delivery_address.create',
            compact('user', 'profile', 'voivodeships', 'currentRouteName')
        );
    }
}

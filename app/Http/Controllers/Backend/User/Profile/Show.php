<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend\User\Profile;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Services\Basket;

class Show extends Controller
{
    /**
     * Display the profile.
     *
     * @param Request $request Request
     * @param Basket  $basket  Basket
     * @param Profile $profile Profile
     * 
     * @return View
     */
    public function __invoke(
        Request $request,
        Basket $basket,
        Profile $profile
    ): View {
        $this->authorize('view', $profile);

        $user = $request->user();
        $profile = $user->profile;
        $currentRouteName = 'backend.users.profiles';
        
        $hasBasket = false;
        if ($basket->productsCount() > 0) {
            $hasBasket = true;
        }

        return view(
            'backend.user.profile.show',
            compact('user', 'profile', 'hasBasket', 'currentRouteName')
        );
    }
}
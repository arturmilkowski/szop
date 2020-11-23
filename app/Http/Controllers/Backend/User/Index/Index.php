<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend\User\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Services\Basket;

class Index extends Controller
{
    /**
     * User backend index page.
     *
     * @param Request $request Request
     * @param Basket  $basket  Basket
     * 
     * @return View
     */
    public function __invoke(Request $request, Basket $basket): View
    {
        $user = $request->user();
        $profile = null;
        $currentRouteName = 'backend.users.index';
        
        if (isset($user->profile)) {
            
            $profile = $user->profile;

            $hasBasket = false;
            if ($basket->productsCount() > 0) {
                $hasBasket = true;
            }

            return view(
                'backend.user.index.index',
                [
                    'profile' => $profile,
                    'hasBasket' => $hasBasket,
                    'currentRouteName' => $currentRouteName
                ]
            );
        }
        
        return view(
            'backend.user.profile.complete',
            ['currentRouteName' => $currentRouteName]
        );
    }
}

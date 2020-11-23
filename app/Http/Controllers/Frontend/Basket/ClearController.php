<?php

namespace App\Http\Controllers\Frontend\Basket;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\Basket;

class ClearController extends Controller
{
    /**
     * Clear all products in basket.
     *
     * @param Basket $basket Basket.
     * 
     * @return RedirectResponse
     */
    public function __invoke(Basket $basket): RedirectResponse
    {
        $basket->clear();

        return back()
            ->with('alert', config('settings.ui.backend.alerts.success'))
            ->with('message', config('settings.ui.backend.messages.removed_basket'));
    }
}

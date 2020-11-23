<?php

namespace App\Http\Controllers\Frontend\Basket;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Models\Type;
use App\Services\Basket;

class DestroyController extends Controller
{
    /**
     * Remove product from basket.
     *
     * @param Basket $basket Basket
     * @param Type   $type   Type of product
     * 
     * @return RedirectResponse
     */
    public function __invoke(Basket $basket, Type $type): RedirectResponse
    {
        $basket->remove($type);

        return back()
            ->with('alert', config('settings.ui.backend.alerts.success'))
            ->with('message', config('settings.ui.backend.messages.removed'));
    }
}

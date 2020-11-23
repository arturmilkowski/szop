<?php

namespace App\Http\Controllers\Frontend\Page;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Delivery\Delivery as Model;

class Delivery extends Controller
{
    /**
     * Show delivery cost.
     *
     * @return View
     */
    public function __invoke(): View
    {
        $currentRouteName = 'frontend.pages.delivery';

        $deliveries = Model::all();
        $methodOfPayment = config('settings.delivery.methods_of_payment.prepayment');
        
        return view(
            'frontend.page.delivery',
            compact('deliveries', 'methodOfPayment', 'currentRouteName')
        );
    }
}

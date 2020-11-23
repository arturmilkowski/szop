<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend\Order\Thank;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WithoutAuthorizationController extends Controller
{

    /**
     * Thank for order view.
     *
     * @param Request $request Request
     *
     * @return object View | RedirectResponse
     */
    public function __invoke(Request $request) //: object
    {
        if ($request->session()->has('number')) {
            $currentRouteName = 'frontend.orders.cash';

            return view(
                'frontend.order.thank.without_authorization',
                [
                    'number' => $request->session()->get('number'),
                    'total_price' => $request->session()->get('total_price'),
                    'delivery_cost' => session()->get('delivery_cost'),
                    'methodOfPayment' =>
                    config('settings.delivery.methods_of_payment.prepayment'),
                    'sale_document' => session()->get('sale_document'),
                    'total_price_and_delivery_cost' =>
                    $request->session()->get('total_price_and_delivery_cost'),
                    'delivery_name' => session()->get('delivery_name'),
                    'name' => $request->session()->get('name'),
                    'lastname' => $request->session()->get('lastname'),
                    'street' => $request->session()->get('street'),
                    'zip_code' => $request->session()->get('zip_code'),
                    'city' => $request->session()->get('city'),
                    'voivodeship' => $request->session()->get('voivodeship'),
                    'phone' => $request->session()->get('phone'),
                    'currentRouteName' => $currentRouteName,
                ]
            );
        }

        return redirect()->route('frontend.pages.index');
    }
}

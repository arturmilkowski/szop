<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend\Order\Cash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Basket;
use App\Models\SaleDocument;
use App\Models\Delivery\Delivery;
use Tests\Unit\Order\ShippingCost\ShippingCostTest;

class IndexController extends Controller
{
    /**
     * Cash  page.
     *
     * @param Request  $request  Request
     * @param Basket   $basket   Basket
     * @param Delivery $delivery Delivery
     *
     * @return object RedirectResponse|View
     */
    public function __invoke(
        Request $request,
        Basket $basket,
        Delivery $delivery
    ): object {
        // TODO write middleware?
        // no direct hit
        if ($basket->isClear()) {
            return redirect()->route('frontend.pages.index');
        }
        $pocztaPolska = 1;
        $delivery = $delivery->find($pocztaPolska);
        // $productsCount = $basket->productsCount();
        $listPolecony = 1;
        // $sizeS = 2;
        $costModel = $delivery->methods[0]->costs[0];
        /*
        $deliveryCost = $costModel->calculate(
            $methodID = $listPolecony,
            $piece = $basket->productsCount(),
            $sizeID = $sizeS
        );
        */

        $deliveryCost = $costModel->calculate($listPolecony, $basket);

        $totalPriceAndDeliveryCost 
            = $basket->totalPriceAndDeliveryCost($deliveryCost);
        session()->put('delivery_cost', $deliveryCost);
        session()->put('total_price_and_delivery_cost', $totalPriceAndDeliveryCost);
        session()->put('delivery_name', $delivery->display_name);

        $currentRouteName = 'frontend.orders.cash';
        $saleDocuments = SaleDocument::all();

        $user = $request->user();
        if ($user != null) {
            $profile = $request->user()->profile;
            if ($profile == null) {
                return view(
                    'backend.user.profile.complete',
                    compact('currentRouteName')
                );
            }

            $deliveryAddress = $profile->deliveryAddress;

            return view(
                'frontend.order.cash.with_authorization',
                [
                    'basket' => $basket,
                    'user' => $user,
                    'deliveryAddress' => $deliveryAddress,
                    'saleDocuments' => $saleDocuments,
                    'deliveryName' => $delivery->display_name,
                    'deliveryCost' => $deliveryCost,
                    'methodOfPayment' =>
                    config('settings.delivery.methods_of_payment.prepayment'),
                    'currentRouteName' => $currentRouteName
                ]
            );
        }

        return view(
            'frontend.order.cash.index',
            [
                'basket' => $basket,
                'deliveryCost' => $deliveryCost,
                'totalPriceAndDeliveryCost' => $totalPriceAndDeliveryCost,
                'currentRouteName' => $currentRouteName
            ]
        );
    }
}

<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Services\Cart;

class CheckoutController extends Controller
{
    public function __invoke(Cart $cart): RedirectResponse | View
    {
        if ($cart->isEmpty()) {
            return redirect()->route('pages.index');
        }

        $deliveryName = config('settings.delivery.polish_post_office.name');
        $deliveryMethod = config('settings.delivery.polish_post_office.methods.registered_letter');
        $productsCount = $cart->itemsCount();
        $deliveryCost = config('settings.delivery.polish_post_office.cost.' . $productsCount);
        $totalPriceAndDeliveryCost = $cart->totalPriceAndDeliveryCost($deliveryCost);

        return view('order.checkout.index', [
            'cart' => $cart,
            'deliveryName' => $deliveryName,
            'deliveryMethod' => $deliveryMethod,
            'deliveryCost' => $deliveryCost,
            'totalPriceAndDeliveryCost' => $totalPriceAndDeliveryCost,
        ]);
    }
}

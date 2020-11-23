<?php

namespace App\Http\Controllers\Frontend\Order\WithoutRegistration;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Services\Basket;
use App\Models\{Voivodeship, SaleDocument};

class CreateController extends Controller
{
    /**
     * Show order form.
     *
     * @param Basket $basket Basket
     * 
     * @return View | RedirectResponse
     */
    public function __invoke(Basket $basket): object
    {
        // TODO write a middleware?
        if ($basket->productsCount() == 0) {
            return redirect()->route('frontend.pages.index');
        }

        $currentRouteName = 'frontend.orders.cash';

        $voivodeships = Voivodeship::all();
        $saleDocuments = SaleDocument::all();
        $deliveryName = session()->get('delivery_name');
        $deliveryCost = session()->get('delivery_cost');
        $totalPriceAndDeliveryCost = session()->get('total_price_and_delivery_cost');
        $methodOfPayment = config('settings.delivery.methods_of_payment.prepayment');

        return view(
            'frontend.order.without_registration.create',
            compact(
                'voivodeships',
                'saleDocuments',
                'basket',
                'deliveryName',
                'deliveryCost',
                'methodOfPayment',
                'totalPriceAndDeliveryCost',
                'currentRouteName'
            )
        );
    }
}

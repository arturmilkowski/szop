<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use App\Services\Cart;
use App\Http\Requests\Order\StoreWithoutRegisterRequest;
use App\Models\Order\SaleDocument;
use App\Models\Customer\Customer;
use App\Models\Order\{Voivodeship, Order};
use App\Events\Order\PlacedWithoutRegistration;

class WithoutRegistrationController extends Controller
{
    public function create(Cart $cart): RedirectResponse | View
    {
        if ($cart->isEmpty()) {
            return redirect()->route('pages.index');
        }

        $deliveryName = config('settings.delivery.polish_post_office.name');
        $deliveryMethod = config('settings.delivery.polish_post_office.methods.registered_letter');
        $productsCount = $cart->itemsCount();
        $deliveryCost = config('settings.delivery.polish_post_office.cost.' . $productsCount);
        $totalPriceAndDeliveryCost = $cart->totalPriceAndDeliveryCost($deliveryCost);
        $voivodeships = Voivodeship::all();
        $saleDocuments = SaleDocument::all();

        return view('order.without-registration', [
            'cart' => $cart,
            'deliveryName' => $deliveryName,
            'deliveryMethod' => $deliveryMethod,
            'deliveryCost' => $deliveryCost,
            'totalPriceAndDeliveryCost' => $totalPriceAndDeliveryCost,
            'voivodeships' => $voivodeships,
            'saleDocuments' => $saleDocuments,
        ]);
    }

    public function store(StoreWithoutRegisterRequest $request, Cart $cart): RedirectResponse | View
    {
        $validated = $request->validated();

        $customer = new Customer();
        $createdCustomer = $customer->create($validated);

        $order = new Order;
        $productsCount = $cart->itemsCount();
        $order->total_price = $cart->totalPrice();
        $deliveryCost = config('settings.delivery.polish_post_office.cost.' . $productsCount);
        $order->delivery_cost = $deliveryCost;
        $order->total_price_and_delivery_cost = $cart->totalPriceAndDeliveryCost($deliveryCost);
        $order->delivery_name = config('settings.delivery.polish_post_office.name');
        $order->sale_document_id = $request->sale_document_id;
        $order->comment = $request->input('comment');
        $savedOrder = $createdCustomer->order()->save($order);
        $items = $cart->getItems();
        $savedOrder->items()->saveMany($items);
        
        PlacedWithoutRegistration::dispatch($cart, $savedOrder, $createdCustomer);
        $cart->clear();

        return redirect()->route('orders.thank.without-registration');
    }
}

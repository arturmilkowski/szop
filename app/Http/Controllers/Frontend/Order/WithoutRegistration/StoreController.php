<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Frontend\Order\WithoutRegistration;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreOrderWithoutRegister;
use App\Models\{Customer, Order};
use App\Services\Basket;
use App\Events\OrderPlacedWithoutRegistration;

class StoreController extends Controller
{
    /**
     * Store customer, order and items.
     *
     * @param StoreOrderWithoutRegister $request Request
     * @param Basket                    $basket  Basket
     * 
     * @return RedirectResponse
     */
    public function __invoke(
        StoreOrderWithoutRegister $request,
        Basket $basket
    ): RedirectResponse {
        // no direct hit
        // TODO write middleware?
        if ($basket->isClear()) {
            return redirect()->route('frontend.pages.index');    
        }
        
        $request->validated();
        
        $customer = new Customer();
        $createdCustomer = $customer->create($request->all());
        
        $order = new Order();

        $comment = $request->input('comment');
        // default value is only for test
        $saleDocumentID = (int) $request->input('sale_document_id', 1);

        $order->setAttributes($basket, $order, $saleDocumentID, $comment);

        $savedOrder = $order->saveCustomerOrder($createdCustomer);
        $items = $basket->getItems();
        $savedOrder->saveItems($items);
        
        event(
            new OrderPlacedWithoutRegistration(
                $request, $basket, $savedOrder, $createdCustomer
            )
        );
        
        $basket->clear();
        
        return redirect()->route('frontend.orders.thank.without_authorization');
    }
}

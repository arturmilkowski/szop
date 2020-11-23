<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend\Order\WithRegistration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Order;
use App\Services\Basket;
use App\Events\OrderPlacedWithRegistration;
use App\Http\Requests\StoreOrder;

class StoreController extends Controller
{
    /**
     * Store order.
     *
     * @param Request $request Validation
     * @param Basket  $basket  Basket
     * 
     * @return RedirectResponse
     */
    public function __invoke(StoreOrder $request, Basket $basket): RedirectResponse
    {
        // no back browser, no direct hit
        if ($basket->isClear()) {
            return redirect()->route('frontend.pages.index');
        }

        $request->validated();

        $user = $request->user();

        $order = new Order();

        $comment = $request->input('comment');
        $saleDocumentID = (int) $request->input('sale_document_id');

        $order->setAttributes($basket, $order, $saleDocumentID, $comment);

        $savedOrder = $order->saveUserOrder($user);

        $savedOrder->saveItems($basket->getItems());
        // dd($order->saleDocument->display_name);
        event(new OrderPlacedWithRegistration($request, $basket, $order));

        $basket->clear();

        return redirect()->route('frontend.orders.thank.with_authorization');
    }
}

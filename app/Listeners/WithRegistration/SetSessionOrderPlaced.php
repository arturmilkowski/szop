<?php

declare(strict_types=1);

namespace App\Listeners\WithRegistration;

use App\Events\OrderPlacedWithRegistration;

class SetSessionOrderPlaced
{

    /**
     * Set session data which are used in thank site.
     *
     * @param OrderPlaced $event Order Placed Event
     * 
     * @return void
     */
    public function handle(OrderPlacedWithRegistration $event): void
    {
        $event->request->session()->put('number', $event->order->number);
        $event->request->session()->put('total_price', $event->order->total_price);
        $event->request->session()->put('created_at', $event->order->created_at);
        $event->request->session()->put(
            'sale_document',
            $event->order->saleDocument->display_name
        );
        /*
        $event->request->session()->put(
            'total_price_and_delivery_cost',
            $event->basket->totalPriceAndDeliveryCost()
        );
        */
    }
}

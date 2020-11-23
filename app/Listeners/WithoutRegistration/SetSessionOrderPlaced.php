<?php

declare(strict_types=1);

namespace App\Listeners\WithoutRegistration;
// use App\Events\OrderPlaced;
use App\Events\OrderPlacedWithoutRegistration;

class SetSessionOrderPlaced
{

    /**
     * Set session data which are used in thank site.
     *
     * @param OrderPlaced $event Order Placed Event
     * 
     * @return void
     */
    public function handle(OrderPlacedWithoutRegistration $event): void
    {
        $event->request->session()->put('number', $event->order->number);
        $event->request->session()->put('total_price', $event->order->total_price);
        $event->request->session()->put('created_at', $event->order->created_at);
        $event->request->session()->put(
            'sale_document',
            $event->order->saleDocument->display_name
        );
        $event->request->session()->put('name', $event->customer->name);
        $event->request->session()->put('lastname', $event->customer->lastname);
        $event->request->session()->put('street', $event->customer->street);
        $event->request->session()->put('zip_code', $event->customer->zip_code);
        $event->request->session()->put('city', $event->customer->city);
        $event->request->session()->put(
            'voivodeship',
            $event->customer->voivodeship->name
        );
        $event->request->session()->put('email', $event->customer->email);
        $event->request->session()->put('phone', $event->customer->phone);
    }
}

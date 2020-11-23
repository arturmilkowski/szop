<?php

namespace App\Listeners\WithoutRegistration;

use App\Events\OrderPlacedWithoutRegistration;
// use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\Order\PlacedWithoutRegistration;

class SendEmailOrderPlaced
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param OrderPlacedWithoutRegistration $event Event
     * 
     * @return void
     */
    public function handle(OrderPlacedWithoutRegistration $event)
    {
        Mail::to(
            $event->customer->email
        )
        ->send(
            new PlacedWithoutRegistration(
                $event->basket, $event->order, $event->customer
            )
        );
    }
}

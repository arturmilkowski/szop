<?php

namespace App\Listeners\WithRegistration;

// use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\Order\PlacedWithRegistration;
use App\Events\OrderPlacedWithRegistration;

class SendEmailOrderPlaced
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    /*
    public function __construct()
    {
        //
    }
    */

    /**
     * Handle the event.
     *
     * @param OrderPlaced $event Order Placed Event
     * 
     * @return void
     */
    public function handle(OrderPlacedWithRegistration $event): void
    {
        Mail::to(
            $event->request->user()
        )
        ->send(
            new PlacedWithRegistration($event->basket, $event->order)
        );
    }
}

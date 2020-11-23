<?php

namespace App\Listeners;

// use App\Events\OrderPlacedWithoutRegistration;
// use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\Order\OrderPlaced;

class SendOrderNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    // public function __construct(){}

    /**
     * Handle the event.
     *
     * @return void
     */
    public function handle(): void
    {
        Mail::to(config('mail.from.address'))->send(new OrderPlaced());
    }
}

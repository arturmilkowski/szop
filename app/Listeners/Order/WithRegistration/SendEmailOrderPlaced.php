<?php

namespace App\Listeners\Order\WithRegistration;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\Order\PlacedWithRegistration;

class SendEmailOrderPlaced
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     */
    public function handle(PlacedWithRegistration $event): void
    {
        dd($event);
    }
}

<?php

namespace App\Listeners\Order\WithoutRegistration;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Events\Order\PlacedWithoutRegistration;
use App\Mail\Order\PlacedWithoutRegistration as WithoutRegistrationMail;

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
    public function handle(PlacedWithoutRegistration $event): void
    {
        // dd($event->customer->email);
        // dd($event->order);
        // dd($event->cart);
        Mail::to($event->customer->email)->send(new WithoutRegistrationMail($event));      
    }
}

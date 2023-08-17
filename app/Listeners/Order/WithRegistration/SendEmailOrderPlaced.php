<?php

namespace App\Listeners\Order\WithRegistration;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Events\Order\PlacedWithRegistration;
use App\Mail\Order\PlacedWithRegistration as WithRegistrationMail;
use Illuminate\Support\Facades\Auth;

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
        Mail::to(Auth::user()->email)->send(new WithRegistrationMail($event));
    }
}

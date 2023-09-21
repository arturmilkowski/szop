<?php

namespace App\Listeners\Order;

use Illuminate\Events\Dispatcher;
use Illuminate\Support\Facades\Mail;
use App\Events\Order\PlacedWithRegistrationEvent;
use App\Mail\Order\PlacedWithRegistration;
use App\Mail\Order\Placed;
use Illuminate\Support\Facades\Auth;

class WithRegistrationEventSubscriber
{
    /**
     * Handle user login events.
     */
    public function handleSendEmailToUser(PlacedWithRegistrationEvent $event): void
    {
        Mail::to(Auth::user()->email)->send(new PlacedWithRegistration($event));
    }

    /**
     * Handle user logout events.
     */
    public function handleSendEmailToAdmin(PlacedWithRegistrationEvent $event): void
    {
        Mail::to(env('MAIL_FROM_ADDRESS', 'hello@example.com'))->send(new Placed($event));
    }

    /**
     * Register the listeners for the subscriber.
     */
    public function subscribe(Dispatcher $events): array
    {
        return [
            PlacedWithRegistration::class => 'handleSendEmailToUser',
            PlacedWithRegistration::class => 'handleSendEmailToAdmin',
        ];
    }
}

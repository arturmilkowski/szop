<?php

namespace App\Listeners\Order;

use Illuminate\Events\Dispatcher;
use Illuminate\Support\Facades\Mail;
use App\Events\Order\PlacedWithoutRegistrationEvent;
use App\Mail\Order\PlacedWithoutRegistration;
use App\Mail\Order\Placed;

class WithoutRegistrationEventSubscriber
{
    /**
     * Handle user login events.
     */
    public function handleSendEmailToCustomer(PlacedWithoutRegistrationEvent $event): void
    {
        Mail::to($event->customer->email)->send(new PlacedWithoutRegistration($event));
    }

    /**
     * Handle user logout events.
     */
    public function handleSendEmailToAdmin(PlacedWithoutRegistrationEvent $event): void
    {
        Mail::to(env('MAIL_FROM_ADDRESS', 'hello@example.com'))->send(new Placed($event));
    }

    /**
     * Register the listeners for the subscriber.
     */
    public function subscribe(Dispatcher $events): array
    {
        return [
            PlacedWithoutRegistration::class => 'handleSendEmailToCustomer',
            PlacedWithoutRegistration::class => 'handleSendEmailToAdmin',
        ];
    }
}

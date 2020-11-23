<?php

namespace App\Mail\Order;

use Illuminate\Bus\Queueable;
// use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\{Order, Customer};
use App\Services\Basket;

class PlacedWithoutRegistration extends Mailable
{
    use Queueable, SerializesModels;

    public $basket, $order, $customer;

    /**
     * Create a new message instance.
     *
     * @param Basket   $basket   Basket
     * @param Order    $order    Order
     * @param Customer $customer Customer
     */
    public function __construct(Basket $basket, Order $order, Customer $customer)
    {
        $this->basket = $basket;
        $this->order = $order;
        $this->customer = $customer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from(config('mail.from.address'))
            ->subject(
                'Zamówienie (bez rejestracji) w sklepie '
                    . config('settings.company_name')
            )
            ->text('emails.order.without_registration.plain.placed');
    }
}

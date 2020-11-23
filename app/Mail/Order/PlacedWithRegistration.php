<?php

namespace App\Mail\Order;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;
use App\Services\Basket;

class PlacedWithRegistration extends Mailable
{
    use Queueable, SerializesModels;

    public $basket, $order;

    /**
     * Create a new message instance.
     *
     * @param Basket $basket Basket
     * @param Order  $order  Order
     */
    public function __construct(Basket $basket, Order $order)
    {
        $this->basket = $basket;
        $this->order = $order;
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
                'Zamówienie w sklepie '
                    . config('settings.company_name')
            )
            ->text('emails.order.with_registration.plain.placed');
    }
}

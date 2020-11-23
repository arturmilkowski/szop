<?php

namespace App\Mail\Order;

// use Illuminate\Bus\Queueable;
// use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
// use App\Models\{Order, Customer};
// use App\Services\Basket;

class OrderPlaced extends Mailable
{
    // use Queueable, SerializesModels;


    // public function __construct() {}

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from(config('mail.from.address'))
            ->subject('złożono zamówienie')
            ->text('emails.order.plain.placed');
    }
}

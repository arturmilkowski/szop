<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;
use App\Events\OrderPlacedInterface;
use App\Models\{Order, Customer};
use App\Services\Basket;

class OrderPlacedWithoutRegistration implements OrderPlacedInterface
{
    use Dispatchable;  // InteractsWithSockets, SerializesModels;

    public $request, $basket, $order, $customer;

    /**
     * Create a new event instance.
     *
     * @param Request  $request  Requesr
     * @param Basket   $basket   Basket
     * @param Order    $order    Order
     * @param Customer $customer Customer
     */
    public function __construct(
        Request $request,
        Basket $basket,
        Order $order,
        Customer $customer
    ) {
        $this->request = $request;
        $this->basket = $basket;
        $this->order = $order;
        $this->customer = $customer;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    /*
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
    */
}

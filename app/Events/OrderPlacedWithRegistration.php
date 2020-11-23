<?php

namespace App\Events;
/*
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
*/
// use Illuminate\Broadcasting\PrivateChannel;
// use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
// use Illuminate\Queue\SerializesModels;
use App\Events\OrderPlacedInterface;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Services\Basket;

class OrderPlacedWithRegistration implements OrderPlacedInterface
{
    use Dispatchable;  // , InteractsWithSockets, SerializesModels;

    public $request, $basket, $order;

    /**
     * Create a new event instance.
     *
     * @param Request $request Request
     * @param Basket  $basket  Basket
     * @param Order   $order   Order
     */
    public function __construct(Request $request, Basket $basket, Order $order)
    {
        $this->request = $request;
        $this->basket = $basket;
        $this->order = $order;
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

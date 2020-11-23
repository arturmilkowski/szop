<?php

namespace App\Listeners;

// use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Queue\InteractsWithQueue;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Order\ChangeStatus;
use App\Events\ChangeOrderStatus;

class SendEmailChangeOrderStatus
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    /*
    public function __construct()
    {
        //
    }
    */

    /**
     * Handle the event.
     *
     * @param ChangeOrderStatus $event Change Order Status Event
     * 
     * @return void
     */
    public function handle(ChangeOrderStatus $event): void
    {
        Mail::to(
            $event->order->orderable->email
        )
        ->send(new ChangeStatus($event->order));
    }
}

<?php

namespace App\Listeners;

use App\Events\OrderPlacedInterface;
use App\Models\Type;

class DecrementItem
{
    /**
     * Handle the event.
     *
     * @param ChangeOrderStatus $event Update product quantity
     * 
     * @return void
     */
    public function handle(OrderPlacedInterface $event): void
    {
        foreach ($event->order->items as $item) {
            $type = Type::find($item->type_id);
            
            if ($type->isInStock()) {
                $type->decrement('quantity', $item->quantity);
            }
        }
    }
}

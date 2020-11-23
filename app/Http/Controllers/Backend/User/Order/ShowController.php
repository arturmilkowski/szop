<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend\User\Order;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Order;

class ShowController extends Controller
{
    /**
     * User'd order detail.
     *
     * @param Order $order Order
     * 
     * @return void
     */
    public function __invoke(Order $order): View
    {
        $this->authorize('view', $order);
        
        $currentRouteName = 'backend.users.orders';

        return view('backend.user.order.show', compact('order', 'currentRouteName'));
    }
}

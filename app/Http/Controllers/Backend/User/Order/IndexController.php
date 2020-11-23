<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend\User\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IndexController extends Controller
{
    /**
     * User's orders index page.
     *
     * @param Request $request Request
     * 
     * @return void
     */
    public function __invoke(Request $request): View
    {
        $orders = $request->user()->orders;
        $currentRouteName = 'backend.users.orders';

        return view(
            'backend.user.order.index',
            compact('orders', 'currentRouteName')
        );
    }
}

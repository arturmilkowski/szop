<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend\Admin\Order;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;
use App\Models\Order;

class IndexController extends Controller
{
    /**
     * Admin. All orders.
     * 
     * @return View
     */
    public function __invoke(): View
    {
        Gate::authorize('admin');

        $orders = Order::orderBy('created_at', 'desc')->get();
        $currentRouteName = 'backend.admins.orders';

        return view(
            'backend.admin.order.index',
            compact('orders', 'currentRouteName')
        );
    }
}

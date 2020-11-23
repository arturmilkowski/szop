<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend\Admin\Order;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;
use App\Models\{Status, Order};

class EditController extends Controller
{
    /**
     * Edit order's status.
     *
     * @param Order $order Order
     * 
     * @return View
     */
    public function __invoke(Order $order): View
    {
        Gate::authorize('admin');

        $statuses = Status::all();
        $currentRouteName = 'backend.admins.orders';
        
        return view(
            'backend.admin.order.edit',
            compact('statuses', 'order', 'currentRouteName')
        );
    }
}

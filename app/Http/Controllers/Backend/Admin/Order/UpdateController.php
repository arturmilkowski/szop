<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend\Admin\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
// use Illuminate\Support\Facades\Mail;
use App\Models\Order;
// use App\Mail\Order\ChangeStatus;
use Illuminate\Support\Facades\Gate;
use App\Events\ChangeOrderStatus;

class UpdateController extends Controller
{
    /**
     * Update order's status.
     *
     * @param Request $request Request
     * @param Order   $order   Order
     * 
     * @return RedirectResponse
     */
    public function __invoke(Request $request, Order $order): RedirectResponse
    {
        Gate::authorize('admin');

        $statusID = $request->input('status_id');
        
        $order->update(['status_id' => $statusID]);

        $message = config('settings.ui.backend.messages.not_changed');
        $alert = config('settings.ui.backend.alerts.warning');

        if ($order->wasChanged()) {
            $message = config('settings.ui.backend.messages.changed');
            $alert = config('settings.ui.backend.alerts.success');

            event(new ChangeOrderStatus($order));
        }

        return redirect()
            ->route('backend.admins.orders.show', [$order->id])
            ->with('alert', $alert)
            ->with('message', $message);
    }
}

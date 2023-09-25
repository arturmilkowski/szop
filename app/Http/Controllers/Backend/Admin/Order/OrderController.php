<?php

namespace App\Http\Controllers\Backend\Admin\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Order\{Status, Order};
use App\Events\Order\ChangeOrderStatusEvent;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Order::class, 'order');
    }

    public function index(): View
    {
        $collection = Order::latest()->simplePaginate(10);

        return view('backend.admin.order.index', ['collection' => $collection]);
    }

    public function show(Order $order): View
    {
        return view('backend.admin.order.show', ['item' => $order]);
    }

    public function edit(Order $order): View
    {
        $statuses = Status::all();

        return view('backend.admin.order.edit', ['statuses' => $statuses, 'item' => $order]);
    }

    public function update(Request $request, Order $order): RedirectResponse
    {
        $order->update(['status_id' => $request->status_id]);

        ChangeOrderStatusEvent::dispatch($order);

        return redirect(route('backend.admins.orders.show', $order))->with('message', 'Zmieniono');
    }

    public function destroy(Order $order): RedirectResponse
    {
        $order->delete();

        return redirect(route('backend.admins.orders.index'))->with('message', 'Usunięto');
    }
}

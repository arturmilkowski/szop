<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Order\Order;

class OrderController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();

        $collection = $user->orders;

        return view('backend.user.order.index', ['collection' => $collection]);
    }

    public function show(Order $order): View
    {
        $this->authorize('view', $order);

        return view('backend.user.order.show', ['item' => $order]);
    }
}

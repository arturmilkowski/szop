<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use App\Services\Cart;

class DashboardController extends Controller
{
    public function __invoke(Cart $cart): View
    {
        $hasCart = !$cart->isEmpty();

        return view('backend.user.dashboard', ['hasCart' => $hasCart]);
    }
}

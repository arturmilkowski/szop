<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\Cart;

class RemoveAllController extends Controller
{
    public function __invoke(Cart $cart): RedirectResponse
    {
        $cart->removeAll();

        return back();
    }
}

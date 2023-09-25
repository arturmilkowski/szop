<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;
use App\Models\Product\Product;
use App\Services\Cart;

class PageController extends Controller
{
    public function index(Cart $cart): View
    {
        $seconds = 60 * 60 * 24;
        $products = Cache::remember('products', $seconds, function () {
            return Product::latest()->get();
        });

        return view('page.page.index', [
            'products' => $products,
            'cart' => $cart
        ]);
    }

    public function about(): View
    {
        return view('page.page.about');
    }
}

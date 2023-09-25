<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;
use App\Models\Product\Product;
use App\Services\Cart;

class ProductController extends Controller
{
    public function index(Cart $cart): View
    {
        $seconds = 60 * 60 * 24;
        $products = Cache::remember('products', $seconds, function () {
            return Product::latest()->get();
        });

        return view('product.index', [
            'products' => $products,
            'cart' => $cart
        ]);
    }

    public function show(Cart $cart, Product $product): View
    {
        return view('product.show', [
            'product' => $product,
            'cart' => $cart
        ]);
    }
}

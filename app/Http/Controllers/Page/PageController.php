<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product\Product;

class PageController extends Controller
{
    public function index(): View // Cart $cart
    {
        $products = Product::all();

        return view('page.page.index', ['products' => $products]);
        /*
        return view(
            'page.page.index',
            [
                'products' => $products,
                'cart' => $cart,
            ]
        );
        */
    }

    public function about(): View
    {
        return view('page.page.about');
    }
}

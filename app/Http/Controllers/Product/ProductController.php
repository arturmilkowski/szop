<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product\Product;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::all();

        return view('product.index', ['products' => $products,]);
    }

    public function show(Product $product): View
    {
        return view('product.show', ['product' => $product]);
    }
}

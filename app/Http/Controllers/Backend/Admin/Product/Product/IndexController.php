<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend\Admin\Product\Product;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;
use App\Models\Product;

class IndexController extends Controller
{
    /**
     * List of products.
     * 
     * @return View
     */
    public function __invoke(): View
    {
        Gate::authorize('admin');
        
        $products = Product::orderBy('created_at', 'desc')->get();
        $currentRouteName = 'backend.admins.products';

        return view(
            'backend.admin.product.product.index', compact('products', 'currentRouteName')
        );
    }
}

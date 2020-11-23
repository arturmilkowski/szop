<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend\Admin\Product\Product\Type;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;
use App\Models\{Category, Concentration, Product, Type};

class EditController extends Controller
{
    /**
     * Show edit product form
     *
     * @param Product $product
     * @param Type $type
     * @return View
     */
    public function __invoke(Product $product, Type $type): View
    {
        Gate::authorize('admin');

        $products = Product::all();
        
        $currentRouteName = 'backend.admins.products';
        
        return view(
            'backend.admin.product.product.type.edit',
            compact('products', 'product', 'type', 'currentRouteName')
        );
    }
}

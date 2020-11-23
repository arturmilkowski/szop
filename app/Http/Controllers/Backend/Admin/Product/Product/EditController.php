<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend\Admin\Product\Product;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;
use App\Models\{Category, Concentration, Product};
use App\Models\Product\Brand;

class EditController extends Controller
{
    /**
     * Show edit form.
     *
     * @param Product $product Product
     *
     * @return View
     */
    public function __invoke(Product $product): View
    {
        Gate::authorize('admin');

        $brands = Brand::all();
        $categories = Category::all();
        $concentrations = Concentration::all();
        $currentRouteName = 'backend.admins.products';
        
        return view(
            'backend.admin.product.product.edit',
            compact(
                'brands',
                'categories',
                'concentrations',
                'product',
                'currentRouteName'
            )
        );
    }
}

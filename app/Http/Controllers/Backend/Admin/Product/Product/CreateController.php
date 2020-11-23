<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend\Admin\Product\Product;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;
use App\Models\{Category, Concentration};
use App\Models\Product\Brand;

class CreateController extends Controller
{
    /**
     * Show create product form.
     *
     * @return View
     */
    public function __invoke(): View
    {
        Gate::authorize('admin');

        $brands = Brand::all();
        $categories = Category::all();
        //dd($categories);
        $concentrations = Concentration::all();

        $currentRouteName = 'backend.admins.products';

        return view(
            'backend.admin.product.product.create',
            compact('brands', 'categories', 'concentrations', 'currentRouteName')
        );
    }
}
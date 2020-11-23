<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend\Admin\Product\Brand;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;
use App\Models\Product\Brand;

class Index extends Controller
{
    /**
     * List of categories.
     * 
     * @return View
     */
    public function __invoke()//: View
    {
        // return __FUNCTION__;
        Gate::authorize('admin');
        
        $brands = Brand::orderBy('created_at', 'desc')->get();
        $currentRouteName = 'backend.admins.products';
        
        return view(
            'backend.admin.product.brand.index',
            compact('brands', 'currentRouteName')
        );
    }
}
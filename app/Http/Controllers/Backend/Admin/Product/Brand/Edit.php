<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend\Admin\Product\Brand;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;
use App\Models\Product\Brand;

class Edit extends Controller
{
    /**
     * Show category edit form.
     *
     * @param Category $category Category
     * 
     * @return View
     */
    public function __invoke(Brand $brand): View
    {
        Gate::authorize('admin');

        $currentRouteName = 'backend.admins.products';
        
        return view(
            'backend.admin.product.brand.edit',
            compact('brand', 'currentRouteName')
        );
    }
}

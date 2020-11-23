<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend\Admin\Product\Brand;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;
use App\Models\Product\Brand;

class Show extends Controller
{
    /**
     * Category details.
     *
     * @param Brand $brand Brand
     * 
     * @return View
     */
    public function __invoke(Brand $brand): View
    {
        Gate::authorize('admin');

        $currentRouteName = 'backend.admins.products';

        return view(
            'backend.admin.product.brand.show',
            compact('brand', 'currentRouteName')
        );
    }
}

<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend\Admin\Product\Brand;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;
use App\Models\{Category, Concentration};

class Create extends Controller
{
    /**
     * Show create category form.
     *
     * @return View
     */
    public function __invoke(): View
    {
        Gate::authorize('admin');

        $currentRouteName = 'backend.admins.products';
        
        return view(
            'backend.admin.product.brand.create',
            compact('currentRouteName')
        );
    }
}

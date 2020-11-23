<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend\Admin\Product\Product;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;
use App\Models\Product;

class ShowController extends Controller
{
    /**
     * Product details.
     *
     * @param Product $product Product
     * 
     * @return View
     */
    public function __invoke(Product $product): View
    {
        Gate::authorize('admin');

        $currentRouteName = 'backend.admins.products';

        return view(
            'backend.admin.product.product.show',
            compact('product', 'currentRouteName')
        );
    }
}

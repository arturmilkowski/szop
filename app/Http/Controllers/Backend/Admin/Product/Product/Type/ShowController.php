<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend\Admin\Product\Product\Type;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;
use App\Models\{Product, Type};

class ShowController extends Controller
{
    /**
     * Show product type details.
     *
     * @param Product $product Product
     * @param Type    $type    Type
     * 
     * @return View
     */
    public function __invoke(Product $product, Type $type): View
    {
        Gate::authorize('admin');

        $currentRouteName = 'backend.admins.products';

        return view(
            'backend.admin.product.product.type.show',
            compact('product', 'type', 'currentRouteName')
        );
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;

class Index extends Controller
{
    /**
     * Products index.
     *
     * @return View
     */
    public function __invoke(): View
    {
        Gate::authorize('admin');

        $currentRouteName = 'backend.admins.products';

        return view(
            'backend.admin.product.index',
            compact('currentRouteName')
        );
    }
}

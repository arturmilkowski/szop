<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend\Admin\Product\Category;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;
use App\Models\Category;

class Show extends Controller
{
    /**
     * Category details.
     *
     * @param Category $category Category
     * 
     * @return View
     */
    public function __invoke(Category $category): View
    {
        Gate::authorize('admin');

        $currentRouteName = 'backend.admins.products';

        return view(
            'backend.admin.product.category.show',
            compact('category', 'currentRouteName')
        );
    }
}
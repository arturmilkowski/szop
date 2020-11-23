<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend\Admin\Product\Category;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;
use App\Models\Category;

class Edit extends Controller
{
    /**
     * Show category edit form.
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
            'backend.admin.product.category.edit',
            compact('category', 'currentRouteName')
        );
    }
}

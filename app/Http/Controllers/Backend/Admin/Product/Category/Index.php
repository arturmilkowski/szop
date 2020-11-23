<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend\Admin\Product\Category;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;
use App\Models\Category;

class Index extends Controller
{
    /**
     * List of categories.
     * 
     * @return View
     */
    public function __invoke(): View
    {
        Gate::authorize('admin');
        
        $categories = Category::orderBy('created_at', 'desc')->get();
        $currentRouteName = 'backend.admins.products';
        
        return view(
            'backend.admin.product.category.index',
            compact('categories', 'currentRouteName')
        );
    }
}

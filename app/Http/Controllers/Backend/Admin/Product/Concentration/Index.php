<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend\Admin\Product\Concentration;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;
use App\Models\Concentration;

class Index extends Controller
{
    /**
     * List of concentrations.
     * 
     * @return View
     */
    public function __invoke(): View
    {
        Gate::authorize('admin');
        
        $concentrations = Concentration::orderBy('created_at', 'desc')->get();
        $currentRouteName = 'backend.admins.products';
        
        return view(
            'backend.admin.product.concentration.index',
            compact('concentrations', 'currentRouteName')
        );
    }
}

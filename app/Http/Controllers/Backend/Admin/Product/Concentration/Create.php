<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend\Admin\Product\Concentration;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;

class Create extends Controller
{
    /**
     * Show create concentration form.
     *
     * @return View
     */
    public function __invoke(): View
    {
        Gate::authorize('admin');

        $currentRouteName = 'backend.admins.products';
        
        return view(
            'backend.admin.product.concentration.create',
            compact('currentRouteName')
        );
    }
}

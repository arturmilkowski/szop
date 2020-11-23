<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend\Admin\Product\Concentration;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;
use App\Models\Concentration;

class Show extends Controller
{
    /**
     * Concentration details.
     *
     * @param Concentration $concentration Concentration
     * 
     * @return View
     */
    public function __invoke(Concentration $concentration): View
    {
        Gate::authorize('admin');

        $currentRouteName = 'backend.admins.products';

        return view(
            'backend.admin.product.concentration.show',
            compact('concentration', 'currentRouteName')
        );
    }
}
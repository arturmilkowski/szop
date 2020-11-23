<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\Admin\Product\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use App\Models\Product\Brand;
use App\Http\Requests\StoreBrand;
// use App\Events\EditProduct;
use Illuminate\Http\Request;

class Store extends Controller
{
    /**
     * Store category.
     *
     * @param StoreCategory $request Validation
     * 
     * @return RedirectResponse
     */
    public function __invoke(StoreBrand $request): RedirectResponse
    {
        Gate::authorize('admin');

        $validated = $request->validated();
        // dd($validated);
        $brand = Brand::create($validated);
        // event(new EditProduct($product));
        
        return redirect()
            ->route('backend.admins.products.brands.index')
            ->with('alert', config('settings.ui.backend.alerts.success'))
            ->with('message', config('settings.ui.backend.messages.added'));
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\Admin\Product\Brand;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use App\Models\Product\Brand;
use App\Http\Requests\StoreBrand;
// use App\Events\EditProduct;

class Update extends Controller
{
    /**
     * Update category.
     *
     * @param StoreBrand $request Validation
     * @param Brand      $brand   Brand
     * 
     * @return RedirectResponse
     */
    public function __invoke(
        StoreBrand $request,
        Brand $brand
    ): RedirectResponse {
        Gate::authorize('admin');
        
        $validated = $request->validated();

        $message = config('settings.ui.backend.messages.not_changed');
        $alert = config('settings.ui.backend.alerts.warning');

        $brand->update($validated);

        if ($brand->wasChanged()) {
            // event(new EditProduct($product));

            $message = config('settings.ui.backend.messages.changed');
            $alert = config('settings.ui.backend.alerts.success');
        }

        return redirect()
            ->route('backend.admins.products.brands.show', [$brand->id])
            ->with('alert', $alert)
            ->with('message', $message);
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\Admin\Product\Category;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use App\Models\Category;
use App\Http\Requests\StoreCategory;
// use App\Events\EditProduct;

class Update extends Controller
{
    /**
     * Update category.
     *
     * @param StoreCategory $request  Validation
     * @param Category      $category Category
     * 
     * @return RedirectResponse
     */
    public function __invoke(
        StoreCategory $request,
        Category $category
    ): RedirectResponse {
        Gate::authorize('admin');
        
        $validated = $request->validated();

        $message = config('settings.ui.backend.messages.not_changed');
        $alert = config('settings.ui.backend.alerts.warning');

        $category->update($validated);

        if ($category->wasChanged()) {
            // event(new EditProduct($product));

            $message = config('settings.ui.backend.messages.changed');
            $alert = config('settings.ui.backend.alerts.success');
        }

        return redirect()
            ->route('backend.admins.products.categories.show', [$category->id])
            ->with('alert', $alert)
            ->with('message', $message);
    }
}

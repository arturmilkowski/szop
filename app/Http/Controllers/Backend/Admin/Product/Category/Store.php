<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\Admin\Product\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use App\Services\Upload;
use App\Models\Category;
use App\Http\Requests\StoreCategory;
use App\Events\EditProduct;

class Store extends Controller
{
    /**
     * Store category.
     *
     * @param StoreCategory $request Validation
     * 
     * @return RedirectResponse
     */
    public function __invoke(StoreCategory $request): RedirectResponse
    {
        Gate::authorize('admin');

        $validated = $request->validated();        

        $category = Category::create($validated);

        // event(new EditProduct($product));

        return redirect()
            ->route('backend.admins.products.categories.index')
            ->with('alert', config('settings.ui.backend.alerts.success'))
            ->with('message', config('settings.ui.backend.messages.added'));
    }
}

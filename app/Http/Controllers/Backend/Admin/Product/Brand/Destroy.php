<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\Admin\Product\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Models\Product\Brand;
use Illuminate\Http\Request;

class Destroy extends Controller
{
    /**
     * Deleting a category.
     *
     * @param Request $request Request
     * @param Brand   $brand   Brand
     * 
     * @return object View | RedirectResponse
     */
    public function __invoke(Request $request, Brand $brand): object
    {
        Gate::authorize('admin');

        $answer = $request->input('delete');

        $currentRouteName = 'backend.admins.products';

        $message = config('settings.ui.backend.messages.not_removed');
        $alert = config('settings.ui.backend.alerts.warning');

        if ($answer == 'Yes') {
            $deleted = $brand->delete();
            // event(new EditProduct($product));

            if ($deleted) {
                $message = config('settings.ui.backend.messages.removed');
                $alert = config('settings.ui.backend.alerts.success');
            }

            return redirect()
                ->route('backend.admins.products.brands.index')
                ->with('alert', $alert)
                ->with('message', $message);
        }

        return view(
            'backend.admin.product.brand.destroy',
            compact('brand', 'currentRouteName')
        );
    }
}

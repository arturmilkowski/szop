<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\Admin\Product\Category;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Events\EditProduct;

class Destroy extends Controller
{
    /**
     * Deleting a category.
     *
     * @param Request  $request  Request
     * @param Category $category Category
     * 
     * @return object View | RedirectResponse
     */
    public function __invoke(Request $request, Category $category): object
    {
        Gate::authorize('admin');

        $answer = $request->input('delete');

        $currentRouteName = 'backend.admins.products';

        $message = config('settings.ui.backend.messages.not_removed');
        $alert = config('settings.ui.backend.alerts.warning');

        if ($answer == 'Yes') {
            $deleted = $category->delete();
            // event(new EditProduct($product));

            if ($deleted) {
                $message = config('settings.ui.backend.messages.removed');
                $alert = config('settings.ui.backend.alerts.success');
            }

            return redirect()
                ->route('backend.admins.products.categories.index')
                ->with('alert', $alert)
                ->with('message', $message);
        }

        return view(
            'backend.admin.product.category.destroy',
            compact('category', 'currentRouteName')
        );
    }
}

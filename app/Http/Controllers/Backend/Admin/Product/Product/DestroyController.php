<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\Admin\Product\Product;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\Upload;
use App\Events\EditProduct;

class DestroyController extends Controller
{
    /**
     * Remove the product from storage.
     *
     * @param Request $request Request
     * @param Upload  $upload  Upload Service
     * @param Product $product Product
     * 
     * @return object View | RedirectResponse
     */
    public function __invoke(
        Request $request,
        Upload $upload,
        Product $product
    ): object {
        Gate::authorize('admin');

        $answer = $request->input('delete');

        $currentRouteName = 'backend.admins.products';

        $message = config('settings.ui.backend.messages.not_removed');
        $alert = config('settings.ui.backend.alerts.warning');

        if ($answer == 'Yes') {
            if ($product->img) {
                $upload->deleteImg(
                    config('settings.storage.products_images_path'),
                    $product->img
                );
            }

            $deleted = $product->delete();
            event(new EditProduct($product));

            if ($deleted) {
                $message = config('settings.ui.backend.messages.removed');
                $alert = config('settings.ui.backend.alerts.success');
            }

            return redirect()
                ->route('backend.admins.products.index')
                ->with('alert', $alert)
                ->with('message', $message);
        }

        return view(
            'backend.admin.product.product.destroy',
            compact('product', 'currentRouteName')
        );
    }
}

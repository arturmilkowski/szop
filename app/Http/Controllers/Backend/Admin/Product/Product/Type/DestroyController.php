<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\Admin\Product\Product\Type;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Services\Upload;
use App\Models\{Product, Type};
use App\Events\EditProduct;

class DestroyController extends Controller
{
    /**
     * Delete product type.
     *
     * @param Request $request Request
     * @param Upload  $upload  Upload Service
     * @param Product $product Product
     * @param Type    $type    Type
     * 
     * @return object
     */
    public function __invoke(
        Request $request,
        Upload $upload,
        Product $product,
        Type $type
    ): object {
        Gate::authorize('admin');

        $answer = $request->input('delete');

        $currentRouteName = 'backend.admins.products';

        $message = config('settings.ui.backend.messages.not_removed');
        $alert = config('settings.ui.backend.alerts.warning');

        if ($answer == 'Yes') {
            if ($type->img) {
                $upload->deleteImg(
                    config('settings.storage.types_images_path'),
                    $type->img
                );
            }

            $deleted = $type->delete();

            event(new EditProduct($product));

            if ($deleted) {
                $message = config('settings.ui.backend.messages.removed');
                $alert = config('settings.ui.backend.alerts.success');
            }

            return redirect()
                ->route('backend.admins.products.show', [$product->id])
                ->with('alert', $alert)
                ->with('message', $message);
        }

        return view(
            'backend.admin.product.product.type.destroy',
            compact('product', 'type', 'currentRouteName')
        );
    }
}

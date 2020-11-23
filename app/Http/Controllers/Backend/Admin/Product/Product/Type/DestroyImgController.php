<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend\Admin\Product\Product\Type;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Models\{Product, Type};
use Illuminate\Http\Request;
use App\Services\Upload;

class DestroyImgController extends Controller
{
    /**
     * Remove image from database and disk.
     *
     * @param Request $request Request
     * @param Upload  $upload  Upload Servive
     * @param Product $product Product
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
            $upload->deleteImg(
                config('settings.storage.types_images_path'), $type->img
            );

            $type->img = null;
            $deleted = $type->save();

            if ($deleted) {
                $message = config('settings.ui.backend.messages.removed');
                $alert = config('settings.ui.backend.alerts.success');
            }
    
            return redirect()
                ->route(
                    'backend.admins.products.types.show',
                    [$product->id, $type->id]
                )
                ->with('alert', $alert)
                ->with('message', $message);
        }

        return view(
            'backend.admin.product.product.type.destroy_img',
            compact('product', 'type', 'currentRouteName')
        );
    }
}
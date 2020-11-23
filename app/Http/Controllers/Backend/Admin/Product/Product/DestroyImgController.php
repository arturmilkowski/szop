<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Backend\Admin\Product\Product;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Models\Product;
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
        Product $product
    ): object {
        Gate::authorize('admin');
        
        $answer = $request->input('delete');

        $currentRouteName = 'backend.admins.products';
        
        $message = config('settings.ui.backend.messages.not_removed');
        $alert = config('settings.ui.backend.alerts.warning');

        if ($answer == 'Yes') {
            $upload->deleteImg(
                config('settings.storage.products_images_path'),
                $product->img
            );
            $product->img = null;
            $deleted = $product->save();

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
            'backend.admin.product.product.destroy_img',
            compact('product', 'currentRouteName')
        );
    }
}

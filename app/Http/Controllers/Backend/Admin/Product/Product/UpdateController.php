<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\Admin\Product\Product;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use App\Models\Product;
use App\Http\Requests\StoreProduct;
use App\Services\Upload;
use App\Events\EditProduct;

class UpdateController extends Controller
{
    /**
     * Update product.
     *
     * @param StoreProduct $request Validation
     * @param Product      $product Product
     * @param Upload       $upload  Upload Service
     * 
     * @return RedirectResponse
     */
    public function __invoke(
        StoreProduct $request,
        Product $product,
        Upload $upload
    ): RedirectResponse {
        Gate::authorize('admin');

        $brand_id = $request->input('brand_id', 'NULL');
        $hide = $request->input('hide', '0');
        $validated = $request->validated();
        $validated['brand_id'] = $brand_id;
        $validated['hide'] = $hide;

        $message = config('settings.ui.backend.messages.not_changed');
        $alert = config('settings.ui.backend.alerts.warning');
        
        $product->update($validated);

        $fileUploaded = false;
        if ($request->hasFile('img')) {
            // TODO move this code somethere
            $img = $request->img;
            $imgName = $upload->setImgName($img, $product->slug);
            $img->storeAs(config('settings.storage.products_images_path'), $imgName);

            $product->img = $imgName;
            $fileUploaded = $product->save();
            // end todo
        }

        if ($product->wasChanged()) {
            event(new EditProduct($product));

            $message = config('settings.ui.backend.messages.changed');
            if ($fileUploaded) {
                $message .= '. ' .
                    config('settings.ui.backend.messages.file_uploaded');
            }
            $alert = config('settings.ui.backend.alerts.success');
        }

        return redirect()
            ->route('backend.admins.products.show', [$product->id])
            ->with('alert', $alert)
            ->with('message', $message);
    }
}

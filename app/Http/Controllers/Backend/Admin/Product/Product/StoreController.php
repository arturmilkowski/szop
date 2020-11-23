<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\Admin\Product\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use App\Services\Upload;
use App\Models\Product;
use App\Http\Requests\StoreProduct;
use App\Events\EditProduct;

class StoreController extends Controller
{
    /**
     * Store product.
     *
     * @param StoreProduct $request Validation
     * @param Upload       $upload  Upload Service
     * 
     * @return RedirectResponse
     */
    public function __invoke(StoreProduct $request, Upload $upload): RedirectResponse
    {
        Gate::authorize('admin');

        $hide = $request->input('hide', '0');
        $validated = $request->validated();
        $validated['hide'] = $hide;

        $product = Product::create($validated);

        if ($request->hasFile('img')) {
            // TODO move this code somewhere
            $img = $request->img;
            $imgName = $upload->setImgName($img, $product->slug);
            $img->storeAs(config('settings.storage.products_images_path'), $imgName);
            $product->img = $imgName;
            $product->save();
            // end todo
        }

        event(new EditProduct($product));

        return redirect()
            ->route('backend.admins.products.index')
            ->with('alert', config('settings.ui.backend.alerts.success'))
            ->with('message', config('settings.ui.backend.messages.added'));
    }
}

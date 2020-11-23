<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\Admin\Product\Product\Type;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use App\Models\{Product, Type};
use App\Http\Requests\StoreType;
use App\Services\Upload;
use App\Events\EditProduct;

class UpdateController extends Controller
{
    /**
     * Update type.
     *
     * @param StoreType $request Validation
     * @param Upload    $upload  Upload Service
     * @param Product   $product Product
     * @param Type      $type    Type
     * 
     * @return RedirectResponse
     */
    public function __invoke(
        StoreType $request,
        Upload $upload,
        Product $product,
        Type $type
    ): RedirectResponse {
        Gate::authorize('admin');

        $hide = $request->input('hide', '0');
        $validated = $request->validated();
        $validated['hide'] = $hide;

        $message = config('settings.ui.backend.messages.not_changed');
        $alert = config('settings.ui.backend.alerts.warning');

        $type->update($validated);

        $fileUploaded = false;
        if ($request->hasFile('img')) {
            $img = $request->img;
            $imgName = $upload->setImgName($img, $product->slug . '-' . $type->slug);
            $img->storeAs(config('settings.storage.types_images_path'), $imgName);
            $type->img = $imgName;
            $fileUploaded = $type->save();  // it generate $type->wasChanged() == []
        }

        if ($type->wasChanged()) {
            event(new EditProduct($product));

            $message = config('settings.ui.backend.messages.changed');
            if ($fileUploaded) {
                $message .= '. ' .
                    config('settings.ui.backend.messages.file_uploaded');
            }
            $alert = config('settings.ui.backend.alerts.success');
        }

        return redirect()
            ->route('backend.admins.products.types.show', [$product->id, $type->id])
            ->with('alert', $alert)
            ->with('message', $message);
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\Admin\Product\Product\Type;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use App\Services\Upload;
use App\Models\Type;
use App\Http\Requests\StoreType;
use App\Events\EditProduct;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Store product type.
     *
     * @param StoreType $request Validation
     * @param Upload    $upload  Upload Service
     * 
     * @return RedirectResponse
     */
    public function __invoke(StoreType $request, Upload $upload): RedirectResponse
    {
        Gate::authorize('admin');

        $hide = $request->input('hide', '0');
        $validated = $request->validated();
        $validated['hide'] = $hide;

        $type = Type::create($validated);

        if ($request->hasFile('img')) {
            $img = $request->img;
            $imgName = $upload->setImgName(
                $img,
                $type->product->slug . '-' . $type->slug
            );
            $img->storeAs(config('settings.storage.types_images_path'), $imgName);
            $type->img = $imgName;
            $type->save();  // it generates $type->wasChanged() == []
        }

        event(new EditProduct($type->product));

        return redirect()
            ->route('backend.admins.products.show', $type->product->id)
            ->with('alert', config('settings.ui.backend.alerts.success'))
            ->with('message', config('settings.ui.backend.messages.added'));
    }
}

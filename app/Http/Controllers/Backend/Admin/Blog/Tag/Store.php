<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\Admin\Blog\Tag;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use App\Models\Blog\Tag;
use App\Http\Requests\StoreTag;


class Store extends Controller
{
    /**
     * Store tag.
     *
     * @param StoreTag $request Validation
     * 
     * @return RedirectResponse
     */
    public function __invoke(StoreTag $request): RedirectResponse
    {
        Gate::authorize('admin');

        $validated = $request->validated();
        Tag::create($validated);
        // event(new EditProduct($product));

        return redirect()
            ->route('backend.admins.blogs.tags.index')
            ->with('alert', config('settings.ui.backend.alerts.success'))
            ->with('message', config('settings.ui.backend.messages.added'));
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\Admin\Blog\Tag;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use App\Models\Blog\Tag;
use App\Http\Requests\StoreTag;

class Update extends Controller
{
    /**
     * Update tag.
     *
     * @param StoreTag $request Validation
     * @param Tag      $tag     Tag
     * 
     * @return RedirectResponse
     */
    public function __invoke(StoreTag $request, Tag $tag): RedirectResponse
    {
        Gate::authorize('admin');

        $validated = $request->validated();

        $tag->update($validated);

        $message = config('settings.ui.backend.messages.not_changed');
        $alert = config('settings.ui.backend.alerts.warning');

        if ($tag->wasChanged()) {
            // event(new EditProduct($product));
            $message = config('settings.ui.backend.messages.changed');
            $alert = config('settings.ui.backend.alerts.success');
        }

        return redirect()
            ->route('backend.admins.blogs.tags.show', [$tag->id])
            ->with('alert', $alert)
            ->with('message', $message);
    }
}

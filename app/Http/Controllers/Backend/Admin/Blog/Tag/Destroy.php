<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\Admin\Blog\Tag;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;
use App\Models\Blog\Tag;

class Destroy extends Controller
{
    /**
     * Delete tag.
     *
     * @param Request $request Request
     * @param Tag     $tag     Tag
     * 
     * @return object View|RedirectResponse
     */
    public function __invoke(Request $request, Tag $tag): object
    {
        Gate::authorize('admin');

        $answer = $request->input('delete');

        $currentRouteName = 'backend.admins.blogs';

        $message = config('settings.ui.backend.messages.not_removed');
        $alert = config('settings.ui.backend.alerts.warning');

        if ($answer == 'Yes') {
            $deleted = $tag->delete();
            // event(new EditProduct($tag));

            if ($deleted) {
                $message = config('settings.ui.backend.messages.removed');
                $alert = config('settings.ui.backend.alerts.success');
            }

            return redirect()
                ->route('backend.admins.blogs.tags.index')
                ->with('alert', $alert)
                ->with('message', $message);
        }

        return view(
            'backend.admin.blog.tag.destroy',
            compact('tag', 'currentRouteName')
        );
    }
}

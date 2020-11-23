<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\Admin\Blog\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Blog\Comment;

class Destroy extends Controller
{
    /**
     * Delete post.
     *
     * @param Request $request Request
     * @param Cpmment $comment Comment
     * 
     * @return object View|RedirectResponse
     */
    public function __invoke(Request $request, Comment $comment): object
    {
        Gate::authorize('admin');

        $answer = $request->input('delete');

        $currentRouteName = 'backend.admins.blogs';

        $message = config('settings.ui.backend.messages.not_removed');
        $alert = config('settings.ui.backend.alerts.warning');

        if ($answer == 'Yes') {
            $deleted = $comment->delete();

            if ($deleted) {
                $message = config('settings.ui.backend.messages.removed');
                $alert = config('settings.ui.backend.alerts.success');
            }

            return redirect()
                ->route('backend.admins.blogs.comments.index')
                ->with('alert', $alert)
                ->with('message', $message);
        }

        return view(
            'backend.admin.blog.comment.destroy',
            compact('comment', 'currentRouteName')
        );
    }
}

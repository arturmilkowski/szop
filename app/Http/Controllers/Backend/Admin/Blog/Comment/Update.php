<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\Admin\Blog\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use App\Models\Blog\Comment;
use App\Http\Requests\StoreComment;
use App\Events\CommentApproved;

class Update extends Controller
{
    /**
     * Update post.
     *
     * @param StoreComment $request Validation
     * @param Comment      $comment Comment
     * 
     * @return RedirectResponse
     */
    public function __invoke(
        StoreComment $request,
        Comment $comment
    ): RedirectResponse {
        Gate::authorize('admin');

        $validated = $request->validated();

        if (!$request->has('approved')) {
            $validated['approved'] = 0;
        }

        $comment->update($validated);

        $message = config('settings.ui.backend.messages.not_changed');
        $alert = config('settings.ui.backend.alerts.warning');

        if ($comment->wasChanged()) {
            event(new CommentApproved($comment));
            $message = config('settings.ui.backend.messages.changed');
            $alert = config('settings.ui.backend.alerts.success');
        }

        return redirect()
            ->route('backend.admins.blogs.comments.show', [$comment->id])
            ->with('alert', $alert)
            ->with('message', $message);
    }
}

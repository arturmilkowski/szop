<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\Admin\Blog\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\Blog\Post;
use App\Http\Requests\StorePost;
use App\Events\EditPost;

class Update extends Controller
{
    /**
     * Update post.
     *
     * @param StorePost $request Validation
     * @param Post      $post    Post
     * 
     * @return RedirectResponse
     */
    public function __invoke(StorePost $request, Post $post): RedirectResponse
    {
        Gate::authorize('admin');

        $validated = $request->validated();

        // only approved post can be published
        if (!$request->has('approved')) {
            $validated['approved'] = 0;
            $validated['published'] = 0;
        }
        if (!$request->has('published')) {
            $validated['published'] = 0;
        }

        $validated['user_id'] = Auth::id();

        $post->update($validated);
        $post->tags()->attach($request['tags']);

        $message = config('settings.ui.backend.messages.not_changed');
        $alert = config('settings.ui.backend.alerts.warning');
        $img = $request->img;

        if ($post->wasChanged()) {
            event(new EditPost($post, $img));

            $message = config('settings.ui.backend.messages.changed');
            $alert = config('settings.ui.backend.alerts.success');
        }

        return redirect()
            ->route('backend.admins.blogs.posts.show', [$post->id])
            ->with('alert', $alert)
            ->with('message', $message);
    }
}

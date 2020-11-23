<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\Admin\Blog\Post;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Models\Blog\{Post, Tag};
use Illuminate\Http\Request;

class DestroyTag extends Controller
{
    /**
     * Remove image from database and disk.
     *
     * @param Request $request Request
     * @param Post    $post    Post
     * @param Tag     $tag     Tag
     * 
     * @return object
     */
    public function __invoke(Request $request, Post $post, Tag $tag): object
    {
        Gate::authorize('admin');

        $answer = $request->input('delete');
        $currentRouteName = 'backend.admins.blogs';

        $message = config('settings.ui.backend.messages.not_removed');
        $alert = config('settings.ui.backend.alerts.warning');

        if ($answer == 'Yes') {
            $post->tags()->detach($tag);

            return redirect()
                ->route('backend.admins.blogs.posts.show', [$post->id])
                ->with('alert', $alert)
                ->with('message', $message);
        }

        return view(
            'backend.admin.blog.post.destroy_tag',
            compact('post', 'tag', 'currentRouteName')
        );
    }
}

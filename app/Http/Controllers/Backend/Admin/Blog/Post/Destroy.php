<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\Admin\Blog\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Services\Upload;
use App\Models\Blog\Post;
use App\Events\DeletePost;

class Destroy extends Controller
{
    /**
     * Delete post.
     *
     * @param Request $request Request
     * @param Upload  $upload  Upload
     * @param Post    $post    Post
     * 
     * @return object View|RedirectResponse
     */
    public function __invoke(Request $request, Upload $upload, Post $post): object
    {
        Gate::authorize('admin');

        $answer = $request->input('delete');

        $currentRouteName = 'backend.admins.blogs';

        $message = config('settings.ui.backend.messages.not_removed');
        $alert = config('settings.ui.backend.alerts.warning');

        if ($answer == 'Yes') {
            if ($post->img) {
                $upload->deleteImg(
                    config('settings.storage.posts_images_path'),
                    $post->img
                );
            }

            $deleted = $post->delete();

            event(new DeletePost());

            if ($deleted) {
                $message = config('settings.ui.backend.messages.removed');
                $alert = config('settings.ui.backend.alerts.success');
            }

            return redirect()
                ->route('backend.admins.blogs.posts.index')
                ->with('alert', $alert)
                ->with('message', $message);
        }

        return view(
            'backend.admin.blog.post.destroy',
            compact('post', 'currentRouteName')
        );
    }
}

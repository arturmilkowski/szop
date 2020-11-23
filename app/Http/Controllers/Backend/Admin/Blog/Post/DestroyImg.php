<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\Admin\Blog\Post;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Models\Blog\Post;
use Illuminate\Http\Request;
use App\Services\Upload;

class DestroyImg extends Controller
{
    /**
     * Remove image from database and disk.
     *
     * @param Request $request Request
     * @param Upload  $upload  Upload Servive
     * @param Post    $post    Post
     * 
     * @return object
     */
    public function __invoke(Request $request, Upload $upload, Post $post): object
    {
        Gate::authorize('admin');

        $answer = $request->input('delete');

        $currentRouteName = 'backend.admins.blogs';

        $message = config('settings.ui.backend.messages.not_removed');
        $alert = config('settings.ui.backend.alerts.warning');

        if ($answer == 'Yes') {
            $upload->deleteImg(
                config('settings.storage.posts_images_path'),
                $post->img
            );
            $post->img = null;
            $deleted = $post->save();

            if ($deleted) {
                $message = config('settings.ui.backend.messages.removed');
                $alert = config('settings.ui.backend.alerts.success');
            }

            return redirect()
                ->route('backend.admins.blogs.posts.show', [$post->id])
                ->with('alert', $alert)
                ->with('message', $message);
        }

        return view(
            'backend.admin.blog.post.destroy_img',
            compact('post', 'currentRouteName')
        );
    }
}

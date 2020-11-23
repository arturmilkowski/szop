<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend\Admin\Blog\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\Blog\Post;
use App\Http\Requests\StorePost;
use App\Events\EditPost;
use App\Services\Upload;

class Store extends Controller
{
    /**
     * Store post.
     *
     * @param StorePost $request Validation
     * @param Upload    $upload  Upload Service
     * 
     * @return RedirectResponse
     */
    public function __invoke(StorePost $request, Upload $upload): RedirectResponse
    {
        /*
        $v = Validator::make($request->all(), []);
        $v->sometimes(
            'published',
            'bool',
            function ($input) {
                return $input->approved == 1;
            }
        );
        */

        Gate::authorize('admin');

        // TODO remove it to validator
        $approved = $published = 0;
        // only approved post can be published
        if ($request->has('approved')) {
            $approved = 1;

            if ($request->has('published')) {
                $published = 1;
            }
        }

        $validated = $request->validated();
        $validated['user_id'] = Auth::id();
        // TODO remove it to the validator
        $validated['approved'] = $approved;
        $validated['published'] =  $published;
        //

        $post = Post::create($validated);
        $post->tags()->sync($request['tags']);
        $img = $request->img;

        event(new EditPost($post, $img));

        return redirect()
            ->route('backend.admins.blogs.posts.index')
            ->with('alert', config('settings.ui.backend.alerts.success'))
            ->with('message', config('settings.ui.backend.messages.added'));
    }
}

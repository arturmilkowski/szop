<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend\Blog\Post\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreComment;
use App\Models\Blog\{Post, Comment};
use App\Events\CommentAdded;

class Store extends Controller
{
    /**
     * Store blog comment.
     *
     * @param StoreComment $request Validation
     * @param Post         $post    Post
     * 
     * @return RedirectResponse
     */
    public function __invoke(StoreComment $request, Post $post): RedirectResponse
    {
        if ($request->has('unwanted')) {  // spam
            return redirect()->route('frontend.pages.index');
        }

        $request->validated();

        $request['agent'] = $request->userAgent();
        $request['ip'] = $request->ip();  // $_SERVER['REMOTE_ADDR']

        $comment = new Comment($request->all());
        $post->comments()->save($comment);

        event(new CommentAdded($comment));

        return redirect()->route('frontend.blog.posts.comments.thank')
            ->with('comment_sent', 'comment sent');
    }
}

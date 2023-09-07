<?php

namespace App\Http\Controllers\Backend\Admin\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use App\Models\Blog\Post;

class PostImgController extends Controller
{
    private $filepath = 'public/images/blog/';

    public function show(Post $post): View
    {
        return view('backend.admin.blog.post.img.show', ['item' => $post]);
    }

    public function destroy(Post $post): RedirectResponse
    {
        Storage::delete($this->filepath . $post->img);
        $post->update(['img' => null]);

        return redirect()
            ->route('backend.admins.blog.posts.show', $post)
            ->with('message', 'Usunięto');
    }
}

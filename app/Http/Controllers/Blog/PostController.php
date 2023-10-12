<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Models\Blog\Post;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Cache::rememberForever('posts', function () {
            return Post::latest()->get();
        });

        return view('blog.post.index', ['posts' => $posts]);
    }

    public function show(Post $post): View
    {
        return view('blog.post.show', ['post' => $post]);
    }
}

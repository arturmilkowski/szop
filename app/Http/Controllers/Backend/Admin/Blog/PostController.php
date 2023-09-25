<?php

namespace App\Http\Controllers\Backend\Admin\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use App\Models\Blog\Post;
use App\Http\Requests\Blog\StorePostRequest;
use App\Services\File;

class PostController extends Controller
{
    private $filepath = 'public/images/blog/';

    public function index(): View
    {
        $collection = Post::latest()->simplePaginate(10);

        return view('backend.admin.blog.post.index', ['collection' => $collection]);
    }

    public function create(): View
    {
        return view('backend.admin.blog.post.create');
    }

    public function store(StorePostRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $file = $request->file('img');
        if ($file) {
            $extension = $file->extension();
            $filename = $validated['slug'] . '.' . $extension;
            File::store($request, $this->filepath, $filename);
            $validated['img'] = $filename;
        }

        $post = $request->user()->posts()->create($validated);
        // $post = Post::create($validated);

        return redirect(route('backend.admins.blog.posts.show', $post))->with('message', 'Dodano');
    }

    public function show(Post $post): View
    {
        return view('backend.admin.blog.post.show', ['item' => $post]);
    }

    public function edit(Post $post): View
    {
        return view('backend.admin.blog.post.edit', ['item' => $post]);
    }

    public function update(StorePostRequest $request, Post $post): RedirectResponse
    {
        $validated = $request->validated();

        $file = $request->file('img');
        if ($file) {
            $extension = $file->extension();
            $filename = $validated['slug'] . '.' . $extension;
            $path = File::update($request, $post->img, $this->filepath, $filename);
            if ($path) {
                $validated['img'] = $filename; // assign new path
            }
        }

        $post->update($validated);

        return redirect(route('backend.admins.blog.posts.show', $post))->with('message', 'Zmieniono');
    }

    public function destroy(Post $post): RedirectResponse
    {
        if ($post->img) {
            Storage::delete($this->filepath . $post->img);
        }
        $post->delete();

        return redirect(route('backend.admins.blog.posts.index'))->with('message', 'Usunięto');
    }
}

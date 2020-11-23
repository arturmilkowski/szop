<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend\Blog\Tag;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Blog\Tag;
// use Illuminate\Support\Facades\Cache;

class Show extends Controller
{
    public function __invoke(Tag $tag): View
    {
        $tag = Tag::with('posts')->find($tag->id);

        $currentRouteName = 'frontend.blog';

        return view(
            'frontend.blog.tag.show',
            compact('tag', 'currentRouteName')
        );
    }
}

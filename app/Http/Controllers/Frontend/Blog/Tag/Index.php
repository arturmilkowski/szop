<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend\Blog\Tag;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Blog\Tag;
use Illuminate\Support\Facades\Cache;

class Index extends Controller
{
    public function __invoke() //: View
    {
        // return __FUNCTION__;
        $tags = Tag::all();
        $currentRouteName = 'frontend.blog';

        return view(
            'frontend.blog.tag.index',
            compact('tags', 'currentRouteName')
        );
    }
}

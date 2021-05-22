<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend\Page;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;
use App\Models\Product;
use App\Models\Blog\Post;
use App\Services\Basket;
use Illuminate\Support\Facades\Redis;
use Illuminate\Contracts\Cache\Repository;

class Index extends Controller
{
    const SECONDS = 60 * 60 * 168;  // 12 = 12 hours. 168 = one week

    /**
     * Index frontend page.
     *
     * @param Basket $basket Basket
     * 
     * @return View
     */
    public function __invoke(Basket $basket): View
    {
        /*
        $posts = Cache::remember(
            'latest_posts',
            self::SECONDS,
            function () {
                return Post::published()
                    ->latest()
                    ->take(4)
                    ->get();
            }
        );
        $products = Cache::remember(
            'latest_products',
            self::SECONDS,
            function () {
                return Product::getActive();
            }
        );
        */
        $posts = Post::published()
            ->latest()
            ->take(4)
            ->get();           
        $products = Product::getActive();
        $currentRouteName = 'frontend.pages.index';

        return view(
            'frontend.page.index',
            compact('posts', 'products', 'basket', 'currentRouteName')
        );
    }
}

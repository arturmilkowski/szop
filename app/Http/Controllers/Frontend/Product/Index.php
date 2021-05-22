<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend\Product;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Product;
use App\Services\Basket;
use Illuminate\Support\Facades\Cache;

class Index extends Controller
{
    const SECONDS = 60 * 60 * 12;

    /**
     * Index product page.
     *
     * @param Basket $basket Basket
     * 
     * @return View
     */
    public function __invoke(Basket $basket): View
    {
        /*
        $products = Cache::remember(
            'latest_products',
            self::SECONDS,
            function () {
                return Product::getActive();
            }
        );
        */
        $products = Product::getActive();
        $currentRouteName = 'frontend.product';

        return view(
            'frontend.product.index',
            compact('products', 'basket', 'currentRouteName')
        );
    }
}

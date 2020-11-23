<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend\Product;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Services\Basket;

class Show extends Controller
{
    const SECONDS = 60 * 60 * 12;

    /**
     * Show product page.
     *
     * @param Basket  $basket  Basket
     * @param Product $product Product
     * 
     * @return View
     */
    public function __invoke(Basket $basket, Product $product): View
    {
        $productKey = 'product' . $product->id;
        $typesKey = 'product_types' . $product->id;

        if (Cache::has($productKey)) {
            $product = Cache::get($productKey);
            $types = Cache::get($typesKey);
        } else {
            $product = Product::with(
                ['types', 'category', 'concentration', 'reviews']
            )->find($product->id);
            $types = $product->types()->where('hide', 0)->get();

            Cache::put($productKey, $product, self::SECONDS);
            Cache::put($typesKey, $types, self::SECONDS);            
        }

        $currentRouteName = 'frontend.product';

        return view(
            'frontend.product.show',
            compact('product', 'types', 'basket', 'currentRouteName')
            // 'rating', 'reviewCount',
        );
    }
}

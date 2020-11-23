<?php

declare(strict_types = 1);
use App\Models\Product;
use App\Models\Product\Review;

$factory->define(
    Review::class,
    function () {
        return [            
            // 'product_id' => $product = factory(Product::class)->create(),
            'rating' => 1.0,
            'content' => 'fajna perfuma',
            'author' => 'Dorota'
        ];
    }
);

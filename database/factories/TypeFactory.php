<?php

declare(strict_types=1);

use Faker\Generator as Faker;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\User;
use App\Models\{Product, Type};

$factory->define(
    Type::class,
    function (Faker $faker) {
        $names = $faker->randomElements(
            ['10 ml', '15 ml', '20ml', '30 ml', '40 ml', '50 ml', '60 ml', '70 ml', '80 ml', '90 ml', '100 ml', '110 ml', '120 ml', '125 ml', '150 ml', '200 ml', '500 ml', '1000 ml', '2000 ml']
        );
        $name = $names[0];
        $slug = Str::slug($name);
        $prices = $faker->randomElements([30, 40, 80, 140, 180]);
        $price = $prices[0];
        $promoPrice = $prices[0];

        return [
            'product_id' => 1,
            'slug' => $slug,
            'name' => $name,
            'price' => $price,
            'promo_price' => $promoPrice,
            'quantity' => $faker->numberBetween(1, 5),
            'hide' => $faker->boolean($chanceOfGettingTrue = 50),
            'description' => $faker->text,
            // 'img' => null,
            'created_at' => now(),
        ];
    }
);

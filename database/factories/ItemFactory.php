<?php

declare(strict_types=1);

use Faker\Generator as Faker;
use App\Models\Item;

$factory->define(
    Item::class,
    function (Faker $faker) {
        return [
            'type_id' => $faker->numberBetween(1, 3),
            'type_name' => $faker->randomElements(['10 ml', '15 ml'])[0],
            'type_size_id' => $faker->numberBetween(1, 6),
            'name' => $faker->randomElements(
                ['lawenda dla panów', 'bergamota dla panów']
            )[0],
            'concentration' => $faker->randomElements(
                ['woda kolońska', 'woda toaletowa']
            )[0],
            'category' => $faker->randomElements(
                ['damskie', 'męskie', 'damsko-męskie']
            )[0],
            'price' => $faker->randomElements([30, 40])[0],
            'quantity' => $faker->numberBetween(1, 5),
            'subtotal_price' => "30.00",
        ];
    }
);

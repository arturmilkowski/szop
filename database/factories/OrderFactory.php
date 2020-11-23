<?php

declare(strict_types = 1);

use Faker\Generator as Faker;
// use Illuminate\Support\Arr;
use App\User;
use App\Models\{Order, Customer, Voivodeship};

$factory->define(
    Order::class,
    function (Faker $faker) {
        $total_price = $faker->numberBetween(10, 1000);
        $orderCost = 10;
        $total_price_and_delivery_cost = $total_price + $orderCost;            

        return [
            'orderable_id' => 1,  // factory(User::class)->create(['role_id' => 3])
            'orderable_type' => 'App\User',  // factory(User::class)->make()
            'status_id' => $faker->numberBetween(1, 5),
            'sale_document_id' => $faker->numberBetween(1, 3),
            'number' => $faker->randomNumber(4),
            'total_price' => $total_price,
            'delivery_cost' => 10,
            'total_price_and_delivery_cost' => $total_price_and_delivery_cost,
            'delivery_name' => 'Poczta Polska',
            'comment' => $faker->randomElement([$faker->paragraph(), '']),
        ];
    }
);

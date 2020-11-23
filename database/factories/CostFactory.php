<?php

declare(strict_types=1);

use Faker\Generator as Faker;
use App\Models\Delivery\{Method, Cost};

$factory->define(
    Cost::class,
    function (Faker $faker) {
        return [
            'method_id' => factory(Method::class)->create(),
            'piece' => 1,
            'size_id' => 1,
            'cost' => 8,
            'description' => '',
        ];
    }
);

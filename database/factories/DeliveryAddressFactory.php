<?php

declare(strict_types = 1);

use App\Models\DeliveryAddress;
use Faker\Generator as Faker;

$factory->define(
    DeliveryAddress::class,
    function (Faker $faker) {
        return [
            'street' => $faker->streetAddress(),
            'zip_code' => $faker->postcode(),
            'city' => $faker->city(),
            'voivodeship_id' => $faker->numberBetween($min = 1, $max = 16),
        ];
    }
);

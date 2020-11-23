<?php

declare(strict_types = 1);

use App\Models\Customer;
use Faker\Generator as Faker;

$factory->define(
    Customer::class,
    function (Faker $faker) {
        return [
            'name' => $faker->firstName,
            'lastname' => $faker->lastName,
            'street' => $faker->streetAddress(),
            'zip_code' => $faker->postcode(),
            'city' => $faker->city(),
            'voivodeship_id' => $faker->numberBetween(1, 16),
            'email' => $faker->unique()->safeEmail,
            'phone' => $faker->randomNumber(9),
        ];
    }
);
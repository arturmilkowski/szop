<?php

declare(strict_types=1);

use App\Models\Profile;
use Faker\Generator as Faker;

$factory->define(
    Profile::class,
    function (Faker $faker) {
        return [
            'user_id' => factory(App\User::class),
            'lastname' => $faker->lastName,
            'street' => $faker->streetAddress(),
            'zip_code' => $faker->postcode(),
            'city' => $faker->city(),
            'voivodeship_id' => factory(App\Models\Voivodeship::class), //$faker->numberBetween($min = 1, $max = 16),
            'phone' => $faker->randomNumber(9), // phoneNumber(),
        ];
    }
);

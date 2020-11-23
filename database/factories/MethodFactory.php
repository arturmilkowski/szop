<?php

declare(strict_types = 1);

use Faker\Generator as Faker;
use App\Models\Delivery\{Delivery, Method};

$factory->define(
    Method::class,
    function (Faker $faker) {
        return [
            'delivery_id' => factory(Delivery::class)->create(), // $faker->numberBetween($min = 1, $max = 2),
            'name' => $faker->randomLetter()[0],  //->randomElements(['list-polecony', 'paczka'])[0],
            'display_name' => $faker->randomLetter()[0],  // $faker->randomElements(['list polecony', 'paczka'])[0],
            'description' => $faker->randomLetter()[0],  // $faker->randomElements(['drogo', 'tanio'])[0],
        ];
    }
);

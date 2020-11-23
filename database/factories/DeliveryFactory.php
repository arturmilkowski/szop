<?php

declare(strict_types = 1);

use Faker\Generator as Faker;
use App\Models\Delivery\Delivery;

$factory->define(
    Delivery::class,
    function (Faker $faker) {
        return [
            /*
            'name' => $faker->randomElements(
                [
                    'poczta-polska',
                    'in-post',
                    'siódemka',
                    'inna-firma',
                    'paczkomaty',
                ]
            )[0],
            */
            'name' => $faker->asciify('********************'),  // $faker->randomLetter()[0],
            'display_name' => $faker->randomLetter()[0],
            'description' => $faker->randomLetter()[0],  // $faker->randomElements(['drogo', 'tanio'])[0],
            'img' => '',
        ];
    }
);

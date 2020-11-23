<?php

declare(strict_types=1);

use Faker\Generator as Faker;
use App\Models\Product\Size;

$factory->define(
    Size::class,
    function (Faker $faker) {
        return [
            'name' => $faker->randomElements(['xs', 's', 'm', 'l', 'xl', 'xxl'])[0], // $faker->asciify('***'),  // $faker->randomLetter()[0],
            'display_name' => $faker->randomElements(['bardzo mały', 'mały', 'średni', 'duży', 'bardzo duży', 'ogromny'])[0], // $faker->randomLetter()[0],
            'description' => $faker->randomLetter()[0],  // $faker->randomElements(['drogo', 'tanio'])[0],
        ];
    }
);

<?php

declare(strict_types = 1);

use App\Models\Voivodeship;
use Faker\Generator as Faker;

$factory->define(
    Voivodeship::class,
    function (Faker $faker) {
        return [
            'id' => 1,
            'name' => 'voivodeship',
        ];
    }
);

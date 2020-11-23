<?php

declare(strict_types = 1);

use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\Product\Brand;

$factory->define(
    Brand::class,
    function (Faker $faker) {
        $name = $faker->company;
        $slug = Str::slug($name, '-');

        return [
            'slug' => $slug,
            'name' => $name,
        ];
    }
);

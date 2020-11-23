<?php

declare(strict_types = 1);

use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\Product;

$factory->define(
    Product::class,
    function (Faker $faker) {
        $name = $faker->sentence(3);
        $slug = Str::slug($name, '-');

        return [
            'category_id' => $faker->numberBetween(1, 3),
            'concentration_id' => $faker->numberBetween(1, 2),
            'slug' => $slug,
            'name' => $name,
            'description' => $faker->text,
            'site_description' => $faker->text(200),
            'site_keyword' => $faker->text(30),
        ];
    }
);

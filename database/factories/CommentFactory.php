<?php

declare(strict_types=1);

use Faker\Generator as Faker;
use App\Models\Blog\Comment;

$factory->define(
    Comment::class,
    function (Faker $faker) {
        return [
            'post_id' => factory(App\Models\Blog\Post::class),
            'ip' => $faker->ipv4,
            'agent' => $faker->userAgent,
            'content' => $faker->text,
            'author' => $faker->firstName,
            'approved' => $faker->numberBetween($min = 0, $max = 1),
        ];
    }
);

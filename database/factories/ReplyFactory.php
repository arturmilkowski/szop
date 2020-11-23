<?php

declare(strict_types=1);

use Faker\Generator as Faker;
use App\Models\Blog\Reply;

$factory->define(
    Reply::class,
    function (Faker $faker) {
        return [
            'comment_id' => factory(App\Models\Blog\Comment::class),
            // 'user_id' => factory(App\User::class),
            'content' => $faker->text,
            'author' => $faker->firstName,
            'approved' => $faker->numberBetween($min = 0, $max = 1),
        ];
    }
);

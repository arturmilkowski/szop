<?php

declare(strict_types=1);

use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\User;
use App\Models\Blog\{Tag, Post};

$factory->define(
    Post::class,
    function (Faker $faker) {
        $title = $faker->sentence(3);
        $slug = Str::slug($title, '-');
        $approved = $faker->numberBetween($min = 0, $max = 1);
        // only approved post can be published
        if ($approved == 0) {
            $published = 0;
        } else {
            $published = $faker->numberBetween($min = 0, $max = 1);
        }

        return [
            // 'user_id' => factory(User::class)->create(['role_id' => 3]),
            // 'tag_id' => factory(Tag::class)->create(),
            'slug' => $slug,
            'title' => $title,
            // 'img' => '',
            'intro' => $faker->text(160),
            'content' => $faker->text,
            'site_description' => $faker->text(200),
            'site_keyword' => $faker->text(30),
            'approved' => $approved,
            'published' => $published,
        ];
    }
);

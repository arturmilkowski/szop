<?php

namespace Database\Factories\Blog;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(3);
        $slug = Str::slug($title, '-');
        $approved = $this->faker->numberBetween($min = 0, $max = 1);
        // only approved post can be published
        if ($approved == 0) {
            $published = 0;
        } else {
            $published = $this->faker->numberBetween($min = 0, $max = 1);
        }

        return [
            'slug' => $slug,
            'title' => $title,
            // 'img' => '',
            'intro' => $this->faker->text(160),
            'content' => $this->faker->text,
            'site_description' => $this->faker->text(200),
            'site_keyword' => $this->faker->text(30),
            'approved' => $approved,
            'published' => $published,
            'comments_allowed' => $this->faker->numberBetween($min = 0, $max = 1),
        ];
    }
}

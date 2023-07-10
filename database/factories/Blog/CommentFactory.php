<?php

namespace Database\Factories\Blog;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ip' => $this->faker->ipv4,
            'agent' => $this->faker->userAgent,
            'content' => $this->faker->text,
            'author' => $this->faker->firstName,
            'approved' => $this->faker->numberBetween($min = 0, $max = 1),
        ];
    }
}

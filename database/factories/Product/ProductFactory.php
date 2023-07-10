<?php

namespace Database\Factories\Product;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->words(3, true);
        $slug = $slug = Str::slug($name, '-');

        return [
            'slug' => $slug,
            'name' => $name,
            'description' => $this->faker->word(3, true),
            'img' => $slug . '.jpg',
            'site_description' => $this->faker->words(3, true),
            'site_keyword' => $this->faker->words(3, true),
            'hide' => $this->faker->boolean(),
        ];
    }
}

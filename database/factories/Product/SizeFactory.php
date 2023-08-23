<?php

namespace Database\Factories\Product;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product\Size>
 */
class SizeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $product = $this->faker->randomElements([
            [
                'slug' => 'xs',
                'name' => 'Bardzo mały',
                'description' => 'Bardzo mały produkt',
            ],
            [
                'slug' => 's',
                'name' => 'Mały',
                'description' => 'Mały produkt',
            ],
            [
                'slug' => 'm',
                'name' => 'Średni',
                'description' => 'Średniej wielkości produkt',
            ]
        ])[0];

        return [
            'slug' => $product['slug'],
            'name' => $product['name'],
            'description' => $product['description'],
        ];
    }
}

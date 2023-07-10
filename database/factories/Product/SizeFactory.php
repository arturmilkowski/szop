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
                'name' => 'xs',
                'display_name' => 'Bardzo mały',
                'description' => 'Bardzo mały produkt',
            ],
            [
                'name' => 's',
                'display_name' => 'Mały',
                'description' => 'Mały produkt',
            ],
            [
                'name' => 'm',
                'display_name' => 'Średni',
                'description' => 'Średniej wielkości produkt',
            ]
        ])[0];

        return [
            'name' => $product['name'],
            'display_name' => $product['display_name'],
            'description' => $product['description'],
        ];
    }
}

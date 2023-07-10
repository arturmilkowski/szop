<?php

namespace Database\Factories\Order;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type_id' => $this->faker->numberBetween(1, 3),
            'type_name' => $this->faker->randomElements(['10 ml', '15 ml'])[0],
            'type_size_id' => $this->faker->numberBetween(1, 6),
            'name' => $this->faker->randomElements(
                ['lawenda dla panów', 'bergamota dla panów']
            )[0],
            'concentration' => $this->faker->randomElements(
                ['woda kolońska', 'woda toaletowa']
            )[0],
            'category' => $this->faker->randomElements(
                ['damskie', 'męskie', 'damsko-męskie']
            )[0],
            'price' => $this->faker->randomElements([30, 40])[0],
            'quantity' => $this->faker->numberBetween(1, 5),
            'subtotal_price' => $this->faker->randomElements(['30.00', '40.00'])[0],
        ];
    }
}

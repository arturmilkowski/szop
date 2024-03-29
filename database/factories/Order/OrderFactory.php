<?php

namespace Database\Factories\Order;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->asciify('**************************'),
            'orderable_type' => $this->faker->randomElement(['App\Models\Customer\Customer', 'App\Models\User']),
            'total_price' => $this->faker->numberBetween(100, 500),
            'delivery_cost' => $this->faker->numberBetween(15, 20),
            'total_price_and_delivery_cost' => $this->faker->numberBetween(120, 520),
            'delivery_name' => $this->faker->word(),
            'comment' => $this->faker->words(4, true),
        ];
    }
}

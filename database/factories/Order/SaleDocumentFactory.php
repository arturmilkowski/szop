<?php


namespace Database\Factories\Order;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SaleDocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->word();
        $slug = Str::slug($name);
        $description = $this->faker->word();

        return [
            'slug' => $slug,
            'name' => $name,
            'description' => $description,
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'sku' => $this->faker->unique()->numberBetween($min = 1000001, $max = 1000060), // 8567
            'purchase_price' => 10,
            'selling_price' => 10,
            'utility' => 20,
            'stock' =>  $this->faker->numberBetween($min = 10, $max = 1000), // 8567
        ];
    }
}

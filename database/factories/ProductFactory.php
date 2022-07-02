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
            'sku' => strtoupper($this->faker->bothify('????-####')), // 'Hello 42jz',
            'price' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 2, $max = 1000) // 48.8932
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
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
        return [
            //
            'codigo' => $this->faker->unique()->numberBetween(10000000,99999999),
            'nombre' => $this->faker->name(),
            'descripcion' => $this->faker->text(),
            'categoria' => $this->faker->randomElement(['calzado','ropa','joyeria']),
            'precio' => $this->faker->randomFloat(2, 0, 99999),
            'stock' => $this->faker->numberBetween(0, 999),
        ];
    }
}

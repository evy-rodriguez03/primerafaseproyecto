<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\libro>
 */
class libroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->sentence(),
            'autor' => $this->faker -> name(),
            'editorial' => $this->faker->company(),
            'anioPublicacion' => $this->faker->numberBetween(1900, 2022),
            'cantidadDisponible' => $this->faker-> numberBetween(0, 10),
        ];
    }
}

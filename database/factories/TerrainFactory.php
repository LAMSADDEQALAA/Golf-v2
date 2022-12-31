<?php

namespace Database\Factories;

use App\Models\Ville;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Terrain>
 */
class TerrainFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "nom" => fake()->name(),
            "email" => fake()->unique()->safeEmail(),
            "lengh" => random_int(500, 6000),
            "region" => fake()->name(),
            "phones" => Str::random(10),
            "NumHoles" => random_int(5, 50),
            "par" => random_int(1, 20),
            "description" => Str::random(50),
            "ville_id" => Ville::all()->random()->id,
        ];
    }
}

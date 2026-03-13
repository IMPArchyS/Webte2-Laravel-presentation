<?php

namespace Database\Factories;

use App\Models\Plant;
use App\Models\Garden;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlantFactory extends Factory
{
    public function definition(): array
    {
        return [
            "name" => fake()->unique()->name(),
            "latin_name" => fake()->name(),
            "planted_at" => fake()->date(),
            "garden_id" => Garden::factory(),
        ];
    }
}

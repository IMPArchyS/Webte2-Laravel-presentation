<?php

namespace Database\Factories;

use App\Models\Garden;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class GardenFactory extends Factory
{
    public function definition(): array
    {
        return [
            "name" => fake()->name(),
            "address" => fake()->address(),
            "user_id" => User::factory(),
        ];
    }
}

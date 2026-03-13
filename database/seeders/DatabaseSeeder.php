<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Garden;
use App\Models\Plant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'imp',
            'email' => 'imp@imp.sk',
            'email_verified_at' => now(),
            'password' => Hash::make('imp'),
            'remember_token' => Str::random(10),
        ]);

        $garden = Garden::factory()->create([
            "name" => "Zahradka",
            "address" => fake()->address(),
            "user_id" => $user->id,
        ]);


        Plant::factory()->count(2)->create([
            "name" => fake()->name(),
            "latin_name" => fake()->name(),
            "planted_at" => fake()->date(),
            "garden_id" => $garden->id,
        ]);
    }
}

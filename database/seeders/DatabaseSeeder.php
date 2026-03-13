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
            'password' => Hash::make('imp'),
        ]);

        $garden = Garden::factory()->create([
            "name" => "Zahradka",
            "user_id" => $user->id,
        ]);


        Plant::factory()->count(2)->create([
            "garden_id" => $garden->id,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    public function index()
    {
        $plants = Plant::all();
        return view("plants.index", ["plants" => $plants]);
    }

    public function create()
    {
        return view("plants.create");
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:plants,name'],
            'latin_name' => ['required', 'string', 'max:255'],
            'garden_id' => ['required', 'exists:gardens,id']
        ]);

        Plant::create([
            'name' => $validated['name'],
            'latin_name' => $validated['latin_name'],
            'planted_at' => now(),
            'garden_id' => $validated['garden_id'],
        ]);

        return to_route('plants.index')->with('message', 'Plant created successfully');
    }

    public function show(Plant $plant)
    {
        return view("plants.show", ["plant" => $plant]);
    }

    public function edit(Plant $plant)
    {
        return view('plants.edit', ['plant' => $plant]);
    }

    public function update(Request $request, Plant $plant)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:plants,name'],
            'latin_name' => ['required', 'string', 'max:255'],
        ]);

        $plant->update([
            'name' => $validated['name'],
            'latin_name' => $validated['latin_name'],
            'planted_at' => now(),
        ]);

        return to_route('plants.show', $plant)->with('message', 'Plant updated successfully');
    }

    public function destroy(Plant $plant)
    {
        $plant->delete();
        return to_route('plants.index')->with('message', 'Plant was deleted');
    }
}

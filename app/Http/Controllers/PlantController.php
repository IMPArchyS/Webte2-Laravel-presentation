<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\Garden;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PlantController extends Controller
{
    public function index()
    {
        $plants = Plant::whereHas('garden', function ($query) {
            $query->where('user_id', auth()->id());
        })->get();

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

        $garden = Garden::findOrFail($validated['garden_id']);

        if ($garden->user_id !== auth()->id()) {
            abort(403);
        }

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
        if ($plant->garden->user_id !== auth()->id()) {
            abort(403);
        }

        return view("plants.show", ["plant" => $plant]);
    }

    public function edit(Plant $plant)
    {
        if ($plant->garden->user_id !== auth()->id()) {
            abort(403);
        }

        return view('plants.edit', ['plant' => $plant]);
    }

    public function update(Request $request, Plant $plant)
    {
        if ($plant->garden->user_id !== auth()->id()) {
            abort(403);
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('plants', 'name')->ignore($plant->id)],
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
        if ($plant->garden->user_id !== auth()->id()) {
            abort(403);
        }

        $plant->delete();
        return to_route('plants.index')->with('message', 'Plant was deleted');
    }
}

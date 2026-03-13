<?php

namespace App\Http\Controllers;

use App\Models\Garden;
use Illuminate\Http\Request;

class GardenController extends Controller
{
    public function index()
    {
        $gardens = Garden::query()->where('user_id', auth()->id())->get();
        return view("gardens.index", ["gardens" => $gardens]);
    }

    public function create()
    {
        return view("gardens.create");
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
        ]);

        Garden::create([
            'name' => $validated['name'],
            'address' => $validated['address'],
            'user_id' => auth()->id(),
        ]);

        return to_route('gardens.index')->with('message', 'Garden created successfully');
    }

    public function show(Garden $garden)
    {
        return view("gardens.show", ["garden" => $garden->load("plants")]);
    }

    public function edit(Garden $garden)
    {
        return view('gardens.edit', ['garden' => $garden]);
    }

    public function update(Request $request, Garden $garden)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
        ]);

        $garden->update([
            'name' => $validated['name'],
            'address' => $validated['address'],
        ]);

        return to_route('gardens.show', $garden)->with('message', 'Garden updated successfully');
    }

    public function destroy(Garden $garden)
    {
        $garden->delete();
        return to_route('gardens.index')->with('message', 'Garden was deleted');
    }
}

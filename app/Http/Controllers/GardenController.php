<?php

namespace App\Http\Controllers;

use App\Models\Garden;
use Illuminate\Http\Request;

class GardenController extends Controller
{
    public function index()
    {
        return Garden::all();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Garden $garden)
    {
        return $garden->load("plants");
    }

    public function edit(Garden $garden)
    {
        //
    }

    public function update(Request $request, Garden $garden)
    {
        //
    }

    public function destroy(Garden $garden)
    {
        //
    }
}

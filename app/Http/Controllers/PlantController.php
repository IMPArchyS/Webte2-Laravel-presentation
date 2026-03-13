<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    public function index()
    {
        return Plant::all();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Plant $plant)
    {
        return $plant;
    }

    public function edit(Plant $plant)
    {
        //
    }

    public function update(Request $request, Plant $plant)
    {
        //
    }

    public function destroy(Plant $plant)
    {
        //
    }
}

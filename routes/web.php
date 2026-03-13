<?php

use App\Http\Controllers\GardenController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Gardens
// Route::get("/gardens", [GardenController::class, 'index'])->name('gardens');
// Route::get("/gardens/{garden}", [GardenController::class, 'show'])->name('gardens.show');
Route::resource("gardens", GardenController::class);

// Plants
Route::get("/plants", [PlantController::class, 'index'])->name('plants.index');
Route::get("/plants/{plant}", [PlantController::class, 'show'])->name('plants.show');

// Auth
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

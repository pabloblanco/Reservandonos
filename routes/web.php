<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ApiPlacesController;
use App\Http\Controllers\PlacesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Se refactorizaron las rutas originales de inertia programando la logica
// en un controlador externo para mantener el codigo limpio

// Ruta principal que renderiza la vista de bienvenida
Route::get('/', [DashboardController::class, 'index']); 

// Grupo de rutas que requieren autenticación
Route::middleware('auth')->group(function () {

    // Rutas para vistas y acciones relacionadas con el usuario
    Route::get('/about', fn () => Inertia::render('About'))->name('about');
    Route::get('users', [UserController::class, 'index'])->name('users.index');

    // Rutas para el perfil del usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas para la API de lugares
    Route::get('/get-api-places', [ApiPlacesController::class, 'getPlacesByFilter']);
    Route::get('/get-api-place/{id}', [ApiPlacesController::class, 'getPlaceById']);    

    // Rutas del dashboard y lugares
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');   
    Route::get('/get-places', [PlacesController::class, 'index'])->name('places.index');
    Route::get('/get-place-by-id/{id}', [PlacesController::class, 'show'])->name('place.show');
    Route::get('/top-five', [PlacesController::class, 'top-five'])->name('places.top-five');    
});

// Incluye las rutas de autenticación desde el archivo 'auth.php'
require __DIR__.'/auth.php';

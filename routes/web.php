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

// Incluye las rutas de autenticación desde el archivo 'auth.php'
require __DIR__.'/auth.php';

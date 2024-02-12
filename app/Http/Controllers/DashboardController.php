<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{

    /**
     * Muestra la página de bienvenida.
     *
     * Esta función renderiza la página de bienvenida, proporcionando datos
     * necesarios para determinar la disponibilidad de las funciones de inicio
     * de sesión y registro, así como la versión de Laravel y PHP.
     *
     * @return \Inertia\Response
     */
    public function index()
    {

        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),          // Indica si la ruta de inicio de sesión está disponible
            'canRegister' => Route::has('register'),    // Indica si la ruta de registro está disponible
            'laravelVersion' => Application::VERSION,   // Versión actual de Laravel
            'phpVersion' => PHP_VERSION,                // Versión actual de PHP
        ]);

    }

    /**
     * Muestra la página del panel de control.
     *
     * Esta función renderiza la página del panel de control.
     *
     * @return \Inertia\Response
     */
    public function dashboard()
    {

        return Inertia::render('Dashboard');

    }  

}
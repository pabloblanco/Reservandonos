<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Http\Controllers\ApiPlacesController;

class PlacesController extends Controller
{
    /**
     * Muestra la lista de lugares.
     *
     * @return \Inertia\Response
     */    
    public function index()
    {    

        // Crear una instancia del controlador de la API externa
        $apiPlacesController = new ApiPlacesController();

        // Obtener la lista de lugares desde la API externa
        $places = $apiPlacesController->getPlacesByFilter();

        // Renderizar la vista de lugares usando Inertia
        return Inertia::render('Places/Index', ['places' => $places]);
        
    }

    /**
     * Muestra la información detallada de un lugar.
     *
     * @param  int  $id
     * @return \Inertia\Response
     */
    public function show($id)
    {

        // Crear una instancia del controlador de la API externa
        $apiPlacesController = new ApiPlacesController();

        // Obtener la información del lugar por ID desde la API externa
        $place = $apiPlacesController->getPlaceById($id);

        // Realizar acciones con el lugar, como pasar los datos a la vista
        return Inertia::render('Places/Show', ['place' => $place]);

    }    
}

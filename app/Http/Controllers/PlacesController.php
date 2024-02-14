<?php

namespace App\Http\Controllers;
   
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\Place;
use App\Models\Like;

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

    public function topFivePlaces()
    {
        // Obtengo los 5 lugares con más likes, ordenados por score en caso de empate
        $topPlaces = Place::select(
            'places.*',
            DB::raw('COUNT(likes.id) as likes_count'),
        )
            ->leftJoin('likes', 'places.id', '=', 'likes.place_id')
            ->groupBy('places.id')
            ->orderByDesc('likes_count')
            ->orderByDesc('score')
            ->limit(5)
            ->get();
    
        // Devuelve la vista con los lugares obtenidos
        return Inertia::render('Places/TopFivePlaces', [
            'topPlaces' => $topPlaces,
        ]);
    }    
    
}

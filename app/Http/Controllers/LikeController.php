<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Place;
use App\Models\Like;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Create a like for a user and a place.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $placeId The ID of the place to like or unlike.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        // Obtén el ID del usuario autenticado
        $userId = auth()->id();
        
        // Obtengo el Id, Name y Score del lugar que vino en el request
        $placeId =  $request->input('place_id');
        $placeName = $request->input('place_name');
        $placeScore =  $request->input('place_score');

        // Busca el lugar por su ID
        $place = Place::find($placeId);

        // Si el lugar no existe, se crea con la información proporcionada en el request
        if (!$place) {

            $placeData = [
                'id' => $placeId,
                'name' => $placeName,
                'score' => $placeScore
            ];
            $place = Place::create($placeData);

        }

        // Verifica si ya existe un like para este usuario y lugar
        $existingLike = Like::where(['user_id' => $userId, 'place_id' => $placeId])->first();

        // Si no existe el like lo crea
        if (!$existingLike) {
            
            $like = new Like([
                'user_id' => $userId,
                'place_id' => $placeId,
            ]);
            $like->save();

            return null;
        }

        return null;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Like $like)
    {
        //
    }
}


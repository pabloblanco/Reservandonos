<?php

namespace Tests\Feature;

use Tests\TestCase;

class ApiPlacesControllerTest extends TestCase
{
    /**
     * Prueba para el método getPlacesByFilter.
     */
    public function testGetPlacesByFilter()
    {
        $response = $this->get('/get-api-places');

        $response->assertStatus(200);
        // Aseguramos de que la respuesta sea válida
        $response->assertJsonStructure([
            'status',
            'message',
            'page',
            'showMore',
            'schema',
            'last_page',
            'total_place',
            'data',
        ]);
    }

    /**
     * Prueba para el método getPlaceById.
     */
    public function testGetPlaceById()
    {
        // Supongamos que $id es un valor válido para un lugar existente
        $id = 822;
        $response = $this->get("/get-api-place/{$id}");

        $response->assertStatus(200);
        // Aseguramos de que la respuesta sea válida
        $response->assertJsonStructure([
            'data',
        ]);
    }
}
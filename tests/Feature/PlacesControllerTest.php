<?php

namespace Tests\Feature;

use App\Http\Controllers\ApiPlacesController;
use Inertia\Testing\AssertableInertia as Assert;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;

class PlacesControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Prueba para el método index de PlacesController.
     *
     * @return void
     */
    public function testIndex()
    {
        // Crear un usuario para simular la autenticación
        $user = User::factory()->create();

        // Realizar una solicitud GET a la ruta '/get-places' como usuario autenticado          
        $response = $this->actingAs($user)->get('/get-places');

        // Afirmar que la redirección se haya completado correctamente con un código de estado HTTP 200
        $response->assertStatus(200); // Asegúrate de que la redirección se haya completado correctamente
        
        // Afirmar que la respuesta es una respuesta Inertia con el componente 'Places/Index'
        $response->assertInertia(fn (Assert $page) => $page
            ->component('Places/Index')
        );
    
    }

    /**
     * Prueba para el método show de PlacesController.
     *
     * @return void
     */
    public function testShow()
    {
        // Supongamos que $id es un valor válido para un lugar existente
        $id = 822;

        // Crear un usuario para simular la autenticación
        $user = User::factory()->create(); 

        // Realizar una solicitud GET a la ruta de la acción 'show' con el ID proporcionado
        $response = $this->actingAs($user)->get("/get-place-by-id/{$id}");

        // Afirmar que la respuesta tiene un código de estado HTTP 200 (éxito)
        $response->assertStatus(200);

        // Afirmar que la respuesta es una respuesta Inertia con el componente 'Places/Show'
        $response->assertInertia(fn (Assert $page) => $page
            ->component('Places/Show')
        );
    }
}

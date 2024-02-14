<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Like;
use App\Models\Place;
use App\Models\User;

class LikeControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test creating a like for a user and a place.
     *
     * @return void
     */
    public function testCreateLike()
    {
        // Crea un usuario autenticado
        $user = User::factory()->create();
        $this->actingAs($user);

        // Crea un lugar en la base de datos
        $placeId = 1;
        $placeName = 'Ejemplo Lugar';
        $placeScore = 4.5;
        $place = Place::create(['id' => $placeId, 'name' => $placeName, 'score' => $placeScore]);

        // Envía una solicitud para crear un like
        $response = $this->post(route('like.create'), [
            'place_id' => $placeId,
            'place_name' => $placeName,
            'place_score' => $placeScore,
        ]);

        // Verifica que la respuesta sea exitosa
        $response->assertStatus(200);

        // Verifica que se haya creado el like en la base de datos
        $this->assertDatabaseHas('likes', [
            'user_id' => $user->id,
            'place_id' => $placeId,
        ]);

        // Verifica que se haya creado el lugar si no existía previamente
        $this->assertDatabaseHas('places', [
            'id' => $placeId,
            'name' => $placeName,
            'score' => $placeScore,
        ]);
    }

    /**
     * Test creating a like without providing information about the place.
     *
     * @return void
     */
    public function testCreateLikeWithoutPlace()
    {
        // Crea un usuario autenticado
        $user = User::factory()->create();
        $this->actingAs($user);

        // Envía una solicitud para crear un like sin proporcionar información sobre el lugar
        $response = $this->post(route('like.create'));

        // Verifica que la respuesta sea exitosa
        $response->assertStatus(200);

        // Verifica que no se haya creado un like en la base de datos
        $this->assertDatabaseMissing('likes', [
            'user_id' => $user->id,
        ]);

        // Verifica que no se haya creado un nuevo lugar en la base de datos
        $this->assertDatabaseMissing('places', []);
    }

}
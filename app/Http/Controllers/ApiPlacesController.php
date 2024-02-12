<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Client;

class ApiPlacesController extends Controller
{
    /**
     * Obtiene una lista de lugares desde una API externa.
     *
     * Este método realiza una solicitud GET a una API externa para obtener
     * una lista de lugares según los parámetros proporcionados.
     *
     * @return array
     */
    public function getPlacesByFilter()
    {
        // Lógica para consultar la API externa y devolver la lista de lugares

        // URL de la API externa
        $apiUrl = 'https://dev.reservandonos.com/api/places/getPlacesByFilter';

        // Parámetros de la solicitud GET
        $queryParams = [
            'mode' => 'web',
            'page' => 0,
        ];
        
        // Configuración de Guzzle
        $client = new Client();

        try {

            // Realizar la solicitud GET
            $response = $client->get($apiUrl, [
                'query' => $queryParams,
            ]);

            if ($response->getStatusCode() === 200) {

                // Decodificar la respuesta JSON
                $places = json_decode($response->getBody()->getContents(), true);

                // Verificar si la decodificación fue exitosa y si 'data' existe
                if (is_array($places) && array_key_exists('data', $places)) {

                    // Devolver el array de la informacion del lugar
                    return $places;

                } else {

                    throw new NotFoundHttpException();

                }
            }

        } catch (RequestException $e) {

            // Manejar errores de Guzzle
            if ($e->hasResponse()) {

                throw new NotFoundHttpException();
                // Si la excepción tiene una respuesta se da la información detallada
                $statusCode = $e->getResponse()->getStatusCode();
                $errorBody = json_decode($e->getResponse()->getBody(), true);
                echo "Error en la solicitud: HTTP $statusCode - " . $errorBody['message'];

            } else {

                throw new NotFoundHttpException();

            }

        }

    }

    /**
     * Obtiene la información del lugar desde una API externa.
     *
     * Este método realiza una solicitud GET a una API externa para obtener
     * la información del lugar según los parámetros proporcionados.
     *
     * @return array
     */
    public function getPlaceById($id)
    {

        // URL de la API externa
        $apiUrl = 'https://dev.reservandonos.com/api/places/getPlaceById/'.$id;
        
        // Nueva instancia de Guzzle
        $client = new Client();
 
        try {

            // Realizar la solicitud GET
            $response = $client->get($apiUrl);

            if ($response->getStatusCode() === 200) {

                // Decodificar la respuesta JSON
                $place = json_decode($response->getBody()->getContents(), true);

                // Verificar si la decodificación fue exitosa y si 'data' existe
                if (is_array($place) && array_key_exists('data', $place)) {

                    // Devolver el array de la informacion del lugar
                    return $place;

                } else {

                    throw new NotFoundHttpException();

                }
                
            }

        } catch (RequestException $e) {

            // Manejar errores de Guzzle
            if ($e->hasResponse()) {

                throw new NotFoundHttpException();
                // Si la excepción tiene una respuesta se da la información detallada
                $statusCode = $e->getResponse()->getStatusCode();
                $errorBody = json_decode($e->getResponse()->getBody(), true);
                echo "Error en la solicitud: HTTP $statusCode - " . $errorBody['message'];

            } else {

                throw new NotFoundHttpException();

            }

        }

    }

}
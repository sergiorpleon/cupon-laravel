<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ciudadesApiTest extends TestCase
{
    use MakeciudadesTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateciudades()
    {
        $ciudades = $this->fakeciudadesData();
        $this->json('POST', '/api/v1/ciudades', $ciudades);

        $this->assertApiResponse($ciudades);
    }

    /**
     * @test
     */
    public function testReadciudades()
    {
        $ciudades = $this->makeciudades();
        $this->json('GET', '/api/v1/ciudades/'.$ciudades->id);

        $this->assertApiResponse($ciudades->toArray());
    }

    /**
     * @test
     */
    public function testUpdateciudades()
    {
        $ciudades = $this->makeciudades();
        $editedciudades = $this->fakeciudadesData();

        $this->json('PUT', '/api/v1/ciudades/'.$ciudades->id, $editedciudades);

        $this->assertApiResponse($editedciudades);
    }

    /**
     * @test
     */
    public function testDeleteciudades()
    {
        $ciudades = $this->makeciudades();
        $this->json('DELETE', '/api/v1/ciudades/'.$ciudades->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/ciudades/'.$ciudades->id);

        $this->assertResponseStatus(404);
    }
}

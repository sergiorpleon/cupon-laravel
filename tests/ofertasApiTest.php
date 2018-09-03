<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ofertasApiTest extends TestCase
{
    use MakeofertasTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateofertas()
    {
        $ofertas = $this->fakeofertasData();
        $this->json('POST', '/api/v1/ofertas', $ofertas);

        $this->assertApiResponse($ofertas);
    }

    /**
     * @test
     */
    public function testReadofertas()
    {
        $ofertas = $this->makeofertas();
        $this->json('GET', '/api/v1/ofertas/'.$ofertas->id);

        $this->assertApiResponse($ofertas->toArray());
    }

    /**
     * @test
     */
    public function testUpdateofertas()
    {
        $ofertas = $this->makeofertas();
        $editedofertas = $this->fakeofertasData();

        $this->json('PUT', '/api/v1/ofertas/'.$ofertas->id, $editedofertas);

        $this->assertApiResponse($editedofertas);
    }

    /**
     * @test
     */
    public function testDeleteofertas()
    {
        $ofertas = $this->makeofertas();
        $this->json('DELETE', '/api/v1/ofertas/'.$ofertas->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/ofertas/'.$ofertas->id);

        $this->assertResponseStatus(404);
    }
}

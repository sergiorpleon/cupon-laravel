<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ventasApiTest extends TestCase
{
    use MakeventasTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateventas()
    {
        $ventas = $this->fakeventasData();
        $this->json('POST', '/api/v1/ventas', $ventas);

        $this->assertApiResponse($ventas);
    }

    /**
     * @test
     */
    public function testReadventas()
    {
        $ventas = $this->makeventas();
        $this->json('GET', '/api/v1/ventas/'.$ventas->id);

        $this->assertApiResponse($ventas->toArray());
    }

    /**
     * @test
     */
    public function testUpdateventas()
    {
        $ventas = $this->makeventas();
        $editedventas = $this->fakeventasData();

        $this->json('PUT', '/api/v1/ventas/'.$ventas->id, $editedventas);

        $this->assertApiResponse($editedventas);
    }

    /**
     * @test
     */
    public function testDeleteventas()
    {
        $ventas = $this->makeventas();
        $this->json('DELETE', '/api/v1/ventas/'.$ventas->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/ventas/'.$ventas->id);

        $this->assertResponseStatus(404);
    }
}

<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class tiendasApiTest extends TestCase
{
    use MaketiendasTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatetiendas()
    {
        $tiendas = $this->faketiendasData();
        $this->json('POST', '/api/v1/tiendas', $tiendas);

        $this->assertApiResponse($tiendas);
    }

    /**
     * @test
     */
    public function testReadtiendas()
    {
        $tiendas = $this->maketiendas();
        $this->json('GET', '/api/v1/tiendas/'.$tiendas->id);

        $this->assertApiResponse($tiendas->toArray());
    }

    /**
     * @test
     */
    public function testUpdatetiendas()
    {
        $tiendas = $this->maketiendas();
        $editedtiendas = $this->faketiendasData();

        $this->json('PUT', '/api/v1/tiendas/'.$tiendas->id, $editedtiendas);

        $this->assertApiResponse($editedtiendas);
    }

    /**
     * @test
     */
    public function testDeletetiendas()
    {
        $tiendas = $this->maketiendas();
        $this->json('DELETE', '/api/v1/tiendas/'.$tiendas->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/tiendas/'.$tiendas->id);

        $this->assertResponseStatus(404);
    }
}

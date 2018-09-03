<?php

use App\Models\ventas;
use App\Repositories\ventasRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ventasRepositoryTest extends TestCase
{
    use MakeventasTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ventasRepository
     */
    protected $ventasRepo;

    public function setUp()
    {
        parent::setUp();
        $this->ventasRepo = App::make(ventasRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateventas()
    {
        $ventas = $this->fakeventasData();
        $createdventas = $this->ventasRepo->create($ventas);
        $createdventas = $createdventas->toArray();
        $this->assertArrayHasKey('id', $createdventas);
        $this->assertNotNull($createdventas['id'], 'Created ventas must have id specified');
        $this->assertNotNull(ventas::find($createdventas['id']), 'ventas with given id must be in DB');
        $this->assertModelData($ventas, $createdventas);
    }

    /**
     * @test read
     */
    public function testReadventas()
    {
        $ventas = $this->makeventas();
        $dbventas = $this->ventasRepo->find($ventas->id);
        $dbventas = $dbventas->toArray();
        $this->assertModelData($ventas->toArray(), $dbventas);
    }

    /**
     * @test update
     */
    public function testUpdateventas()
    {
        $ventas = $this->makeventas();
        $fakeventas = $this->fakeventasData();
        $updatedventas = $this->ventasRepo->update($fakeventas, $ventas->id);
        $this->assertModelData($fakeventas, $updatedventas->toArray());
        $dbventas = $this->ventasRepo->find($ventas->id);
        $this->assertModelData($fakeventas, $dbventas->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteventas()
    {
        $ventas = $this->makeventas();
        $resp = $this->ventasRepo->delete($ventas->id);
        $this->assertTrue($resp);
        $this->assertNull(ventas::find($ventas->id), 'ventas should not exist in DB');
    }
}

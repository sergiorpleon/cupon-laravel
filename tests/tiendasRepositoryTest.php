<?php

use App\Models\tiendas;
use App\Repositories\tiendasRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class tiendasRepositoryTest extends TestCase
{
    use MaketiendasTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var tiendasRepository
     */
    protected $tiendasRepo;

    public function setUp()
    {
        parent::setUp();
        $this->tiendasRepo = App::make(tiendasRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatetiendas()
    {
        $tiendas = $this->faketiendasData();
        $createdtiendas = $this->tiendasRepo->create($tiendas);
        $createdtiendas = $createdtiendas->toArray();
        $this->assertArrayHasKey('id', $createdtiendas);
        $this->assertNotNull($createdtiendas['id'], 'Created tiendas must have id specified');
        $this->assertNotNull(tiendas::find($createdtiendas['id']), 'tiendas with given id must be in DB');
        $this->assertModelData($tiendas, $createdtiendas);
    }

    /**
     * @test read
     */
    public function testReadtiendas()
    {
        $tiendas = $this->maketiendas();
        $dbtiendas = $this->tiendasRepo->find($tiendas->id);
        $dbtiendas = $dbtiendas->toArray();
        $this->assertModelData($tiendas->toArray(), $dbtiendas);
    }

    /**
     * @test update
     */
    public function testUpdatetiendas()
    {
        $tiendas = $this->maketiendas();
        $faketiendas = $this->faketiendasData();
        $updatedtiendas = $this->tiendasRepo->update($faketiendas, $tiendas->id);
        $this->assertModelData($faketiendas, $updatedtiendas->toArray());
        $dbtiendas = $this->tiendasRepo->find($tiendas->id);
        $this->assertModelData($faketiendas, $dbtiendas->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletetiendas()
    {
        $tiendas = $this->maketiendas();
        $resp = $this->tiendasRepo->delete($tiendas->id);
        $this->assertTrue($resp);
        $this->assertNull(tiendas::find($tiendas->id), 'tiendas should not exist in DB');
    }
}

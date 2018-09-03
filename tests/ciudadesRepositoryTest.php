<?php

use App\Models\ciudades;
use App\Repositories\ciudadesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ciudadesRepositoryTest extends TestCase
{
    use MakeciudadesTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ciudadesRepository
     */
    protected $ciudadesRepo;

    public function setUp()
    {
        parent::setUp();
        $this->ciudadesRepo = App::make(ciudadesRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateciudades()
    {
        $ciudades = $this->fakeciudadesData();
        $createdciudades = $this->ciudadesRepo->create($ciudades);
        $createdciudades = $createdciudades->toArray();
        $this->assertArrayHasKey('id', $createdciudades);
        $this->assertNotNull($createdciudades['id'], 'Created ciudades must have id specified');
        $this->assertNotNull(ciudades::find($createdciudades['id']), 'ciudades with given id must be in DB');
        $this->assertModelData($ciudades, $createdciudades);
    }

    /**
     * @test read
     */
    public function testReadciudades()
    {
        $ciudades = $this->makeciudades();
        $dbciudades = $this->ciudadesRepo->find($ciudades->id);
        $dbciudades = $dbciudades->toArray();
        $this->assertModelData($ciudades->toArray(), $dbciudades);
    }

    /**
     * @test update
     */
    public function testUpdateciudades()
    {
        $ciudades = $this->makeciudades();
        $fakeciudades = $this->fakeciudadesData();
        $updatedciudades = $this->ciudadesRepo->update($fakeciudades, $ciudades->id);
        $this->assertModelData($fakeciudades, $updatedciudades->toArray());
        $dbciudades = $this->ciudadesRepo->find($ciudades->id);
        $this->assertModelData($fakeciudades, $dbciudades->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteciudades()
    {
        $ciudades = $this->makeciudades();
        $resp = $this->ciudadesRepo->delete($ciudades->id);
        $this->assertTrue($resp);
        $this->assertNull(ciudades::find($ciudades->id), 'ciudades should not exist in DB');
    }
}

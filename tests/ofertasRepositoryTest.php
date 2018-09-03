<?php

use App\Models\ofertas;
use App\Repositories\ofertasRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ofertasRepositoryTest extends TestCase
{
    use MakeofertasTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ofertasRepository
     */
    protected $ofertasRepo;

    public function setUp()
    {
        parent::setUp();
        $this->ofertasRepo = App::make(ofertasRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateofertas()
    {
        $ofertas = $this->fakeofertasData();
        $createdofertas = $this->ofertasRepo->create($ofertas);
        $createdofertas = $createdofertas->toArray();
        $this->assertArrayHasKey('id', $createdofertas);
        $this->assertNotNull($createdofertas['id'], 'Created ofertas must have id specified');
        $this->assertNotNull(ofertas::find($createdofertas['id']), 'ofertas with given id must be in DB');
        $this->assertModelData($ofertas, $createdofertas);
    }

    /**
     * @test read
     */
    public function testReadofertas()
    {
        $ofertas = $this->makeofertas();
        $dbofertas = $this->ofertasRepo->find($ofertas->id);
        $dbofertas = $dbofertas->toArray();
        $this->assertModelData($ofertas->toArray(), $dbofertas);
    }

    /**
     * @test update
     */
    public function testUpdateofertas()
    {
        $ofertas = $this->makeofertas();
        $fakeofertas = $this->fakeofertasData();
        $updatedofertas = $this->ofertasRepo->update($fakeofertas, $ofertas->id);
        $this->assertModelData($fakeofertas, $updatedofertas->toArray());
        $dbofertas = $this->ofertasRepo->find($ofertas->id);
        $this->assertModelData($fakeofertas, $dbofertas->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteofertas()
    {
        $ofertas = $this->makeofertas();
        $resp = $this->ofertasRepo->delete($ofertas->id);
        $this->assertTrue($resp);
        $this->assertNull(ofertas::find($ofertas->id), 'ofertas should not exist in DB');
    }
}

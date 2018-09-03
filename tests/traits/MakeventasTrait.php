<?php

use Faker\Factory as Faker;
use App\Models\ventas;
use App\Repositories\ventasRepository;

trait MakeventasTrait
{
    /**
     * Create fake instance of ventas and save it in database
     *
     * @param array $ventasFields
     * @return ventas
     */
    public function makeventas($ventasFields = [])
    {
        /** @var ventasRepository $ventasRepo */
        $ventasRepo = App::make(ventasRepository::class);
        $theme = $this->fakeventasData($ventasFields);
        return $ventasRepo->create($theme);
    }

    /**
     * Get fake instance of ventas
     *
     * @param array $ventasFields
     * @return ventas
     */
    public function fakeventas($ventasFields = [])
    {
        return new ventas($this->fakeventasData($ventasFields));
    }

    /**
     * Get fake data of ventas
     *
     * @param array $postFields
     * @return array
     */
    public function fakeventasData($ventasFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'fecha' => $fake->word,
            'oferta_id' => $fake->randomDigitNotNull,
            'usuario_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $ventasFields);
    }
}

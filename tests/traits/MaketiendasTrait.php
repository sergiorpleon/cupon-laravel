<?php

use Faker\Factory as Faker;
use App\Models\tiendas;
use App\Repositories\tiendasRepository;

trait MaketiendasTrait
{
    /**
     * Create fake instance of tiendas and save it in database
     *
     * @param array $tiendasFields
     * @return tiendas
     */
    public function maketiendas($tiendasFields = [])
    {
        /** @var tiendasRepository $tiendasRepo */
        $tiendasRepo = App::make(tiendasRepository::class);
        $theme = $this->faketiendasData($tiendasFields);
        return $tiendasRepo->create($theme);
    }

    /**
     * Get fake instance of tiendas
     *
     * @param array $tiendasFields
     * @return tiendas
     */
    public function faketiendas($tiendasFields = [])
    {
        return new tiendas($this->faketiendasData($tiendasFields));
    }

    /**
     * Get fake data of tiendas
     *
     * @param array $postFields
     * @return array
     */
    public function faketiendasData($tiendasFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nombre' => $fake->word,
            'slug' => $fake->word,
            'descripcion' => $fake->word,
            'direccion' => $fake->word,
            'ciudad_id' => $fake->randomDigitNotNull,
            'usuario_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $tiendasFields);
    }
}

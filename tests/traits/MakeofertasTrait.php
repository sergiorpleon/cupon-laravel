<?php

use Faker\Factory as Faker;
use App\Models\ofertas;
use App\Repositories\ofertasRepository;

trait MakeofertasTrait
{
    /**
     * Create fake instance of ofertas and save it in database
     *
     * @param array $ofertasFields
     * @return ofertas
     */
    public function makeofertas($ofertasFields = [])
    {
        /** @var ofertasRepository $ofertasRepo */
        $ofertasRepo = App::make(ofertasRepository::class);
        $theme = $this->fakeofertasData($ofertasFields);
        return $ofertasRepo->create($theme);
    }

    /**
     * Get fake instance of ofertas
     *
     * @param array $ofertasFields
     * @return ofertas
     */
    public function fakeofertas($ofertasFields = [])
    {
        return new ofertas($this->fakeofertasData($ofertasFields));
    }

    /**
     * Get fake data of ofertas
     *
     * @param array $postFields
     * @return array
     */
    public function fakeofertasData($ofertasFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nombre' => $fake->word,
            'slug' => $fake->word,
            'descripcion' => $fake->text,
            'condiciones' => $fake->text,
            'photo' => $fake->word,
            'precio' => $fake->randomDigitNotNull,
            'descuento' => $fake->randomDigitNotNull,
            'fecha_publicacion' => $fake->text,
            'fecha_expiracion' => $fake->text,
            'compras' => $fake->randomDigitNotNull,
            'umbral' => $fake->randomDigitNotNull,
            'revisada' => $fake->word,
            'tienda_id' => $fake->randomDigitNotNull,
            'ciudad_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $ofertasFields);
    }
}

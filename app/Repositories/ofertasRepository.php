<?php

namespace App\Repositories;

use App\Models\ofertas;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ofertasRepository
 * @package App\Repositories
 * @version August 15, 2018, 4:06 pm UTC
 *
 * @method ofertas findWithoutFail($id, $columns = ['*'])
 * @method ofertas find($id, $columns = ['*'])
 * @method ofertas first($columns = ['*'])
*/
class ofertasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'slug',
        'descripcion',
        'condiciones',
        'photo',
        'precio',
        'descuento',
        'fecha_publicacion',
        'fecha_expiracion',
        'compras',
        'umbral',
        'revisada',
        'tienda_id',
        'ciudad_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ofertas::class;
    }
}

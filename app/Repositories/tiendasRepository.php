<?php

namespace App\Repositories;

use App\Models\tiendas;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class tiendasRepository
 * @package App\Repositories
 * @version August 15, 2018, 4:06 pm UTC
 *
 * @method tiendas findWithoutFail($id, $columns = ['*'])
 * @method tiendas find($id, $columns = ['*'])
 * @method tiendas first($columns = ['*'])
*/
class tiendasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'slug',
        'descripcion',
        'direccion',
        'ciudad_id',
        'usuario_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return tiendas::class;
    }
}

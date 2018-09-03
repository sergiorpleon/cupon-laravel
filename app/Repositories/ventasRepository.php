<?php

namespace App\Repositories;

use App\Models\ventas;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ventasRepository
 * @package App\Repositories
 * @version August 15, 2018, 5:24 pm UTC
 *
 * @method ventas findWithoutFail($id, $columns = ['*'])
 * @method ventas find($id, $columns = ['*'])
 * @method ventas first($columns = ['*'])
*/
class ventasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fecha',
        'oferta_id',
        'usuario_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ventas::class;
    }
}

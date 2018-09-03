<?php

namespace App\Repositories;

use App\Models\ciudades;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ciudadesRepository
 * @package App\Repositories
 * @version August 15, 2018, 3:51 pm UTC
 *
 * @method ciudades findWithoutFail($id, $columns = ['*'])
 * @method ciudades find($id, $columns = ['*'])
 * @method ciudades first($columns = ['*'])
*/
class ciudadesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'slug'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ciudades::class;
    }
}

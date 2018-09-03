<?php

namespace App\Repositories;

use App\Models\users;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class usersRepository
 * @package App\Repositories
 * @version August 15, 2018, 4:06 pm UTC
 *
 * @method users findWithoutFail($id, $columns = ['*'])
 * @method users find($id, $columns = ['*'])
 * @method users first($columns = ['*'])
*/
class usersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'role',
        'email',
        //'password',
        //'remember_token'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return users::class;
    }
}

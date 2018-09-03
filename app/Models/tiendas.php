<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class tiendas
 * @package App\Models
 * @version August 15, 2018, 4:06 pm UTC
 *
 * @property string nombre
 * @property string slug
 * @property string descripcion
 * @property string direccion
 * @property integer ciudad_id
 * @property integer usuario_id
 */
class tiendas extends Model
{
    use SoftDeletes;

    public $table = 'tiendas';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'slug',
        'descripcion',
        'direccion',
        'ciudad_id',
        'usuario_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'slug' => 'string',
        'descripcion' => 'text',
        'direccion' => 'string',
        'ciudad_id' => 'integer',
        'usuario_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}

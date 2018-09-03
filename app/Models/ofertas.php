<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ofertas
 * @package App\Models
 * @version August 15, 2018, 4:06 pm UTC
 *
 * @property string nombre
 * @property string slug
 * @property string descripcion
 * @property string condiciones
 * @property string photo
 * @property float precio
 * @property float descuento
 * @property string fecha_publicacion
 * @property string fecha_expiracion
 * @property integer compras
 * @property integer umbral
 * @property boolean revisada
 * @property integer tienda_id
 * @property integer ciudad_id
 */
class ofertas extends Model
{
    use SoftDeletes;

    public $table = 'ofertas';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'slug' => 'string',
        'descripcion' => 'string',
        'condiciones' => 'string',
        'photo' => 'string',
        'precio' => 'float',
        'descuento' => 'float',
        'fecha_publicacion' => 'string',
        'fecha_expiracion' => 'string',
        'compras' => 'integer',
        'umbral' => 'integer',
        'revisada' => 'boolean',
        'tienda_id' => 'integer',
        'ciudad_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}

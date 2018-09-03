<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ciudad extends Model
{
	use SoftDeletes;

    protected $table="ciudades";
	protected $fillable = ['nombre', 'slug'];

	

    protected $dates = ['deleted_at'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [];


	// Definimos las relaciones utilizando funciones.
	// "Un usuario posee uno o varios albumes"
	public function tiendas()
	{
		return $this->hasMany('App\Tienda');
	}

	public function ofertas()
	{
		return $this->hasMany('App\Oferta');
	}
}

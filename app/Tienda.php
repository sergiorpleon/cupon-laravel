<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tienda extends Model
{
	use SoftDeletes;

    protected $table="tiendas";
	protected $fillable=['nombre','slug','descripcion', 'direccion', 'ciudad_id', 'usuario_id'];

	protected $dates = ['deleted_at'];

	// "una tienda esta en una ciudad"
	public function ciudad()
	{
		return $this->belongsTo('App\Ciudad');
	}

	// "una tienda pertenece a un usuario"
	public function propietario()
	{
		return $this->belongsTo('App\User');
	}

	//una tienda tiene muchas ofertas
	public function ofertas()
	{
		return $this->hasMany('App\Oferta');
	}
}

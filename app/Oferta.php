<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Oferta extends Model
{
	use SoftDeletes;

    protected $table="ofertas";
	protected $fillable=['nombre','slug','descripcion', 'condiciones', 'photo', 'precio', 'descuento', 'fecha_publicacion', 'fecha_expiracion', 'compras', 'umbral', 'revisada', 'tienda_id', 'ciudad_id'];

	protected $dates = ['deleted_at'];

	// "Una oferta pertenece a una tienda"
	public function tienda()
	{
		return $this->belongsTo('App\Tienda');
	}
	
	public function ciudad()
	{
		return $this->belongsTo('App\Ciudad');
    }
    
    //una oferta tiene muchas ventas
	public function ventas()
	{
		return $this->hasMany('App\Venta');
	}
}

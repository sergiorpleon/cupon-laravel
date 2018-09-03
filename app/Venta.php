<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venta extends Model
{
	use SoftDeletes;

    protected $table="ventas";
	protected $fillable=['fecha', 'oferta_id', 'usuario_id'];

	protected $dates = ['deleted_at'];

	//una venta le corresponde una oferta
	public function oferta()
	{
		return $this->belongsTo('App\Oferta');
    }
    
    // "una venta le corresponde un usuairo"
	public function usuario()
	{
		return $this->belongsTo('App\User');
	}
}

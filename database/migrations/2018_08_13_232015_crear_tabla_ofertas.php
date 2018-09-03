<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaOfertas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ofertas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('slug');
            $table->text('descripcion');
            $table->text('condiciones');
            $table->string('photo')->default(url('LARAVEL/cupon/public/assets/photo').'/empty.jpg');
            $table->float('precio');
            $table->float('descuento');
            $table->text('fecha_publicacion');
            $table->text('fecha_expiracion');
            $table->integer('compras');
            $table->integer('umbral');
            $table->boolean('revisada');

            $table->integer('tienda_id')->unsigned();
			// Relaciones con las otras tablas:
			$table->foreign('tienda_id')->references('id')->on('tiendas');

            $table->integer('ciudad_id')->unsigned();
			// Relaciones con las otras tablas:
			$table->foreign('ciudad_id')->references('id')->on('ciudades');


            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ofertas');
    }
}

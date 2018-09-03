<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaVentas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('id');

            $table->string('fecha');

            $table->integer('oferta_id')->unsigned();
			// Relaciones con las otras tablas:
			$table->foreign('oferta_id')->references('id')->on('ofertas');
            
            $table->integer('usuario_id')->unsigned();
			// Relaciones con las otras tablas:
			$table->foreign('usuario_id')->references('id')->on('users');

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
        Schema::dropIfExists('ventas');
    }
}

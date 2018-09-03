<?php

use Illuminate\Database\Seeder;

// Hacemos uso de los modelos de nuestra aplicación

use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // Para que no verifique el control de claves foráneas al hacer el truncate haremos:
		DB::statement('SET FOREIGN_KEY_CHECKS=0');

		// Primero hacemos un truncate de las tablas para que no se estén agregando datos
		// cada vez que ejecutamos el seeder.
		//Foto::truncate();
		//Album::truncate();
		//Usuario::truncate();
        DB::table('users')->delete();
        DB::table('ciudades')->delete();
        DB::table('tiendas')->delete();
        DB::table('ofertas')->delete();
        DB::table('ventas')->delete();


		// Es importante el orden de llamada.
		$this->call('UserSeeder');
        $this->call('CiudadSeeder');
		$this->call('TiendaSeeder');
        $this->call('OfertaSeeder');
        $this->call('VentaSeeder');
    }
}

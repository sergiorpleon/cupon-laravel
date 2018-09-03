<?php

use Illuminate\Database\Seeder;

use App\Ciudad;
use App\Tienda;
use App\User;

class TiendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ciudades = Ciudad::all();
		$contador=0;

		foreach ($ciudades as $ciudad)
		{
			$cantidad = mt_rand(1,3);
			for ($i=0;$i< $cantidad;$i++)	
			{
				$contador++;
				
				$id_usuario = mt_rand(0,50);
				$usuario = User::where('id',$id_usuario)->first();
				$usuario->role = 'PROPIETARIO';
				$usuario->save();

				Tienda::create(
					[
					'nombre' => "tienda $contador",
					'slug' => "tienda_$contador",
					'descripcion' => "Descripcion Tienda_".$contador." Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.",
					'direccion' => "Direccion Tienda_$contador",
					'ciudad_id' => $ciudad->id,
					'usuario_id' => $id_usuario
					]);
			}
		}
    }
}

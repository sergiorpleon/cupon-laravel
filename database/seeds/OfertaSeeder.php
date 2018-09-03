<?php

use Illuminate\Database\Seeder;

use App\Tienda;
use App\Oferta;

class OfertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tiendas = Tienda::all();
		$contador=0;

		foreach ($tiendas as $tienda)
		{
			$cantidad = mt_rand(1,4);
			for ($i=0;$i< $cantidad;$i++)	
			{
				$contador++;
				Oferta::create(
					[
					'nombre' => "oferta $contador",
					'slug' => "oferta_$contador",
					'descripcion' => "Descripcion Oferta_".$contador." Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
					Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.",
					'condiciones' => "Condiciones Oferta_$contador",
					'photo' => "/assets/photo/foto".$contador.".jpg",
					'precio' => mt_rand(30,50),
					'descuento' => mt_rand(0,10),
					'fecha_publicacion' => "2018-10-10",
					'fecha_expiracion' => "2018-12-12",
					'compras' => 0,
					'umbral' => mt_rand(10,20),
					'revisada' => (mt_rand(0,2)%2==0)?true:false,
					'tienda_id' => $tienda->id,
					'ciudad_id' => $tienda->ciudad_id
					]);
			}
		}
    }
}

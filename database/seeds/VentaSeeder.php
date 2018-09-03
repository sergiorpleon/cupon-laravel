<?php

use Illuminate\Database\Seeder;

use App\Oferta;
use App\User;
use App\Venta;

class VentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0;$i<30;$i++)
		{
            Venta::create(
                [
                    'fecha' => '2018-10-12',
                    'oferta_id' => Oferta::all()[mt_rand(1,15)]->id,
                    'usuario_id' => User::all()[mt_rand(1,20)]->id
                ]);
			//$p = new App\Venta;
            //$p->fecha = '2018-10-12';
            //$p->oferta_id = Oferta::all()[mt_rand(1,15)]->id;
			//$p->usuario_id = User::all()[mt_rand(1,20)]->id;
            //$p->save();
		}
    }
}

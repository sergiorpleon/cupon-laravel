<?php

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User as Authenticatable;

// Hacemos uso de los modelos de nuestra aplicación

class UserSeeder extends Seeder
{
    /**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        for ($i=0;$i<50;$i++)
		{
            $cantidad = mt_rand(0,5);
			$p = new App\User;
			$p->name = 'usuario '.$i;
			$p->role = 'USER';
            $p->email = 'usuario_'.$i.'@gmail.com';
            $p->password = bcrypt('usuario '.$i);
            $p->save();
		}
	}
}

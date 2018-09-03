<?php

use Illuminate\Database\Seeder;

class CiudadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0;$i<4;$i++)
		{
			$p = new App\Ciudad;
            $p->nombre = 'ciudad '.$i;
            $p->slug = 'ciudad_'.$i;
            $p->save();
		}
    }
}

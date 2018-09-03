<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

use Carbon\Carbon;

class Helper
{
    public static function shout(string $string)
    {
        return strtoupper($string);
    }

    public static function faltan($fecha)
    {
        $expiracion = Carbon::createFromFormat('Y-m-d', $fecha);
        $hoy = Carbon::now();
        return $expiracion->diffInDays();
        //return $expiracion->diffInHours($hoy);
    }

    public static function resta($a, $b)
    {
        return $a-$b;
    }

    public static function truncate($cadena, $palabras){
        $truncated = str_limit($cadena, $palabras);
        return $truncated;
    }

    public static function year(){
        $fecha = Carbon::now();
        return $fecha->format('Y');
    }

    public static function linebreak($string){
       return str_replace('.', '<br/><br/>', $string);
    }
}
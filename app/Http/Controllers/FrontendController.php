<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use App\Ciudad;
use App\Oferta;
use App\Venta;
use App\Tienda;


use Carbon\Carbon;

class FrontendController extends Controller
{

//
    /**
	 * Muestra la portada de una oferta.
	 *
	 * @return Response
	 */
	public function user_logout(Request $request)
	{
	Auth::logout();
	if($request->session()->has('ciudad_slug')){
		$ciudad_slug = $request->session()->get('ciudad_slug');
	}else{
		$ciudad_slug = $ciudades->first()->slug;
	}
	return Redirect::to('/'.$ciudad_slug);
	}



	//
    /**
	 * Muestra la portada de una oferta.
	 *
	 * @return Response
	 */
	public function inicio(Request $request)
	{
		$ciudades = Ciudad::all();
		if($request->session()->has('ciudad_slug')){
			$ciudad_slug = $request->session()->get('ciudad_slug');
		}else{
			$ciudad_slug = $ciudades->first()->slug;
		}
		//$ciudad=$ciudades->first()->slug; 


        $ciudadactual = Ciudad::where('slug',$ciudad_slug)->first();
    
		$cercanas = Ciudad::where('slug','<>',$ciudad_slug)->get();
		$relacionadas = Oferta::where('ciudad_id','<>',$ciudadactual->id)->get();

		$oferta = Oferta::where('ciudad_id',$ciudadactual->id)->first();

		// Devolvera los datos de una oferta
		return View('frontend.portada')->with(array(
			'ciudades'=>$ciudades,
			'ciudadactual'=>$ciudadactual,
			'cercanas'=>$cercanas,
			'relacionadas'=>$relacionadas,
			'oferta'=>$oferta,
		
		));
	}
	
    //
    /**
	 * Muestra la portada de una oferta.
	 *
	 * @return Response
	 */
	public function portada(Request $request, $ciudad='ciudad_0')
	{

		
		//return Response(Carbon::now());
		$ciudades = Ciudad::all();

        $ciudadactual = Ciudad::where('slug',$ciudad)->first();
    
		$cercanas = Ciudad::where('slug','<>',$ciudad)->get();
		$relacionadas = Oferta::where('ciudad_id','<>',$ciudadactual->id)->get();

		$oferta = Oferta::where('ciudad_id',$ciudadactual->id)->first();

		// Devolvera los datos de una oferta
		return View('frontend.portada')->with(array(
			'ciudades'=>$ciudades,
			'ciudadactual'=>$ciudadactual,
			'cercanas'=>$cercanas,
			'relacionadas'=>$relacionadas,
			'oferta'=>$oferta,
		
		));
    }
    
    /**
	 *  Muestra oferta de ciudad.
	 *
	 * @return Response
	 */
	public function oferta(Request $request, $ciudad, $slug)
	{
		$ciudades = Ciudad::all();

        $ciudadactual = Ciudad::where('slug',$ciudad)->first();
		$oferta = Oferta::where('ciudad_id',$ciudadactual->id)->where('slug',$slug)->first();
		$relacionadas = Oferta::where('ciudad_id','<>',$ciudadactual->id)->get();

		// Muestra oferta de ciudad.
		return View('frontend.detalle')->with(array(
			'ciudades'=>$ciudades,
			'ciudadactual'=>$ciudadactual,
			'relacionadas'=>$relacionadas,
			'oferta'=>$oferta,
		
		));
	}
	
	/**
	 *  Muestra oferta de ciudad.
	 *
	 * @return Response
	 */
	public function compras(Request $request)
	{
		$ciudades = Ciudad::all();

		if($request->session()->has('ciudad_slug')){
			$ciudad_slug = $request->session()->get('ciudad_slug');
		}else{
			$ciudad_slug = $ciudades->first()->slug;
		}
		
		$ciudadactual = Ciudad::where('slug', $ciudad_slug)->first();
		
		$cercanas = Ciudad::where('slug', '<>', $ciudad_slug)->get();

		$user = Auth::user();
		$compras = Venta::where('usuario_id', $user->id)->get();

		// Muestra oferta de ciudad.
		return View('frontend.compras')->with(array(
			'ciudades'=>$ciudades,
			'ciudadactual'=>$ciudadactual,
			'cercanas'=>$cercanas,
			'compras'=>$compras,
		
		));
    }
    
    /**
	 * Comprar un oferta.
	 *
	 * @return Response
	 */
	public function comprar(Request $request, $ciudad, $slug)
	{
		# return HttpResponse("Ayuda")
		$ciudades = Ciudad::all();

		$user = Auth::user();
		$oferta = Oferta::where('slug', $slug )->first();
		$oferta->compras = $oferta->compras + 1;
		$oferta->save();

		$venta = new Venta();
		$venta->fecha =  Carbon::now();
		$venta->oferta_id =  $oferta->id;
		$venta->usuario_id = $user->id;
		$venta->save();

		$ciudadactual = Ciudad::where('slug',$ciudad)->first();
		$cercanas = Ciudad::where('id','<>', $ciudadactual->id)->get();
		$compras = Venta::where('usuario_id', $user->id)->get();
		
		// Comprar un oferta.
		return View('frontend.compras')->with(array(
			'ciudades'=>$ciudades,
			'ciudadactual'=>$ciudadactual,
			'cercanas'=>$cercanas,
			'compras'=>$compras,
		
		));
    }
    
    /**
	 * Tienda portada.
	 *
	 * @return Response
	 */
	public function tienda_portada(Request $request, $ciudad, $tienda)
	{
		$ciudades = Ciudad::all();

        $ciudadactual = Ciudad::where('slug',$ciudad)->first();
		$tienda = Tienda::where('slug',$tienda)->where('ciudad_id',$ciudadactual->id)->first();
		
		$ofertas = Oferta::where('ciudad_id',$ciudadactual->id)->where('tienda_id',$tienda->id)->get();
		$cercanas = Tienda::where('id','<>',$tienda->id)->get(); //5
    
		// Mostrando portada de tienda.
		return View('frontend.tienda_portada')->with(array(
			'ciudades'=>$ciudades,
			'ciudadactual'=>$ciudadactual,
			'tienda'=>$tienda,
			'ofertas'=>$ofertas,
			'cercanas'=>$cercanas,
		
		));
    }
    
    /**
	 * Cambiar de ciudad.
	 *
	 * @return Response
	 */
	public function ciudad_cambiar(Request $request, $ciudad)
	{
		$request->session()->put('ciudad_slug', $ciudad );
		// Cambiar de ciudad..
		//return "Cambiar de ciudad.";
		return redirect('/'. $ciudad);
    }
    
    /**
	 * Ofertas recientes de ciudad.
	 *
	 * @return Response
	 */
	public function ciudad_recientes(Request $request, $ciudad='ciudad_2')
	{
		$ciudades = Ciudad::all();

        $ciudadactual = Ciudad::where('slug',$ciudad)->first();
    
		$cercanas = DB::table('ciudades')->where('slug','<>', $ciudad)->take(5)->get();
		$relacionadas = Oferta::where('ciudad_id','<>',$ciudadactual->id)->get();
		
		$ofertas = Oferta::where('ciudad_id',$ciudadactual->id)->where('revisada',1)->take(5)->get();

		
		// Ofertas recientes de ciudad.
		return View('frontend.recientes')->with(array(
			'ciudades'=>$ciudades,
			'ciudadactual'=>$ciudadactual,
			'cercanas'=>$cercanas,
			'relacionadas'=>$relacionadas,
			'ofertas'=>$ofertas,
		
		));
	}
}

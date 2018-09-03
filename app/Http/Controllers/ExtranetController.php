<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
	
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

use App\Venta;
use App\Oferta;
use App\Ciudad;
use App\Tienda;
use App\User;

class ExtranetController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function user_edit(Request $request)
	{
		if($request->isMethod('POST')){
			if( $this->validate($request, [
				 'nombre' => 'required'
			 ]))
			 {
				 $user = Auth::user();
				 $user->name = $request->input('nombre');
				 $user->save();
				 return Redirect::to('/');
			 }
			 return redirect('/user/edit')->withInput();
		}else{
			 return view('auth.edit');
		}
	}

    //
    /**
	 * Portada de tienda.
	 *
	 * @return Response
	 */
	public function extranet_portada()
	{
		$ciudades = Ciudad::all();
		$user = Auth::user();
		$tienda = Tienda::where('usuario_id', $user->id)->first();
		$ofertas = Oferta::where('tienda_id', $tienda->id)->get();
		
		// Portada de tienda.
		return View('extranet.portada')->with(array(
			'ciudades'=>$ciudades,
			'user'=>$user,
			'tienda'=>$tienda,
			'ofertas'=>$ofertas
		));
    }

    /**
	 * Muestra las ventas de una oferta.
	 *
	 * @return Response
	 */
	public function extranet_oferta_ventas($id)
	{
		$ciudades = Ciudad::all();
        $user = User::where('name', 'usuario 42')->first();
		$tienda = Tienda::where('usuario_id', $user->id)->first();
		$oferta = Oferta::where('id', $id)->first();//->where('tienda_id', $tienda->id)
		$ventas = Venta::where('oferta_id', $oferta->id)->get();

		// Muestra las ventas de una oferta
		return View('extranet.ventas')->with(array(
			'ciudades'=>$ciudades,
			'tienda'=>$tienda,
			'oferta'=>$oferta,
			'ventas'=>$ventas
		));
    }

     /**
	 * Formulario datos de tienda.
	 *
	 * @return Response
	 */
	public function extranet_perfil(Request $request)
	{
		if($request->isMethod('POST')){
			if( $this->validate($request, [
				 'nombre' => 'required',
				 'slug' => 'required',
				 'direccion' => 'required',
				 'descripcion' => 'required',
			 ]))
			 {
				 $user = Auth::user();
				 $tienda = Tienda::where('usuario_id',$user->id)->first();
				 $tienda->nombre = $request->input('nombre');
				 $tienda->slug = $request->input('slug');
				 $tienda->dieccion = $request->input('direccion');
				 $tienda->descripcion = $request->input('descripcion');
				 $tienda->save();
				 return Redirect::to('/extranet');
			 }
			 return redirect('/extranet/perfil')->withInput();
		}else{
			$user = Auth::user();
			$tienda = Tienda::where('usuario_id',$user->id)->first();
			
			return view('extranet.edit', array('tienda'=>$tienda));
		}
	}
	
	/**
	 * Formulario datos de tienda.
	 *
	 * @return Response
	 */
	public function extranet_oferta_nueva(Request $request)
	{
		if($request->isMethod('POST')){
			if( $this->validate($request, [
				 'nombre' => 'required',
				 'slug' => 'required',
				 'descripcion' => 'required',
				 'condiciones' => 'required',
				 'precio' => 'required',
				 'descuento' => 'required',
				 'fecha_publicacion' => 'required',
				 'fecha_expiracion' => 'required',
				 'compras' => 'required',
				 'umbral' => 'required',
				 'revisada' => 'required',
			 ]))
			 {
				$oferta = new Oferta();
				$oferta->nombre = $request->input('nombre');
				$oferta->slug = $request->input('slug');
				$oferta->descripcion = $request->input('descripcion');
				$oferta->condiciones = $request->input('condiciones');
				if ($request->file('photo')!=null)
                {
                    if ($request->file('photo')->isValid())
                {
                    
                    $name = $request->file('photo')->getClientOriginalName();
                    $request->file('photo')->move($_SERVER['DOCUMENT_ROOT'].'/cupon/public/assets/photo/',$name);
                    $oferta->poster = url('assets/photo').'/'.$name;
                }
                }
				$oferta->precio = $request->input('precio');
				$oferta->descuento = $request->input('descuento');
				$oferta->fecha_publicacion = $request->input('fecha_publicacion');
				$oferta->fecha_expiracion = $request->input('fecha_expiracion');
				$oferta->compras = $request->input('compras');
				$oferta->umbral = $request->input('umbral');
				$oferta->revisada = ($request->input('revisada')=="checked")?1:0;
                
				$user = Auth::user();
				$tienda = Tienda::where('usuario_id',$user->id)->first();
				$ciudad = Ciudad::where('id',$tienda->ciudad_id)->first();
				$oferta->tienda_id = $tienda->id;
				$oferta->ciudad_id = $ciudad->id;
                $oferta->save();
				return Redirect::to('/extranet');
			 }
			 return redirect('/extranet/oferta/nueva')->withInput();
		}else{			
			return view('extranet.oferta_nueva');
		}
	}
	/**
	 * Formulario datos de tienda.
	 *
	 * @return Response
	 */
	public function extranet_oferta_editar(Request $request, $slug)
	{
		if($request->isMethod('POST')){
			if( $this->validate($request, [
				 'nombre' => 'required',
				 'slug' => 'required',
				 'descripcion' => 'required',
				 'condiciones' => 'required',
				 'precio' => 'required',
				 'descuento' => 'required',
				 'fecha_publicacion' => 'required',
				 'fecha_expiracion' => 'required',
				 'compras' => 'required',
				 'umbral' => 'required',
				 'revisada' => 'required',
			 ]))
			 {
				 $oferta = Oferta::where('slug', $slug)->first();
				 $oferta->nombre = $request->input('nombre');
				 $oferta->slug = $request->input('slug');
				 $oferta->descripcion = $request->input('descripcion');
				 $oferta->condiciones = $request->input('condiciones');
				 if ($request->file('photo')!=null)
                {
                    if ($request->file('photo')->isValid())
                {
                    
                    $name = $request->file('photo')->getClientOriginalName();
                    $request->file('photo')->move($_SERVER['DOCUMENT_ROOT'].'/cupon/public/assets/photo/',$name);
                    $oferta->poster = url('assets/photo').'/'.$name;
                }
                }
				 $oferta->precio = $request->input('precio');
				 $oferta->descuento = $request->input('descuento');
				 $oferta->fecha_publicacion = $request->input('fecha_publicacion');
				 $oferta->fecha_expiracion = $request->input('fecha_expiracion');
				 $oferta->compras = $request->input('compras');
				 $oferta->umbral = $request->input('umbral');
				 $oferta->revisada = ($request->input('revisada')=="checked")?1:0;
                 $oferta->save();
				 return Redirect::to('/extranet');
			 }
			 return redirect('/extranet/oferta/edit/'.$id)->withInput();
		}else{
			
			$oferta = Oferta::where('slug', $slug)->first();
			
			return view('extranet.oferta_edit', array('oferta'=>$oferta));
		}
    }
}

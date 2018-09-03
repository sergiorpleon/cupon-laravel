<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ciudad;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function ayuda(Request $request)
    {
        $ciudades = Ciudad::all();
        if($request->session()->has('ciudad_slug')){
            $ciudad_slug = $request->session()->get('ciudad_slug');
        }else{
            $ciudad_slug = $ciudades->first()->slug;
        }
        $ciudadactual = Ciudad::where('slug',$ciudad_slug)->first();
    
        return view('estaticas.ayuda')->with(array(
			'ciudades'=>$ciudades,
			'ciudadactual'=>$ciudadactual,
		));
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function privacidad(Request $request)
    {
        $ciudades = Ciudad::all();
        if($request->session()->has('ciudad_slug')){
            $ciudad_slug = $request->session()->get('ciudad_slug');
        }else{
            $ciudad_slug = $ciudades->first()->slug;
        }
        $ciudadactual = Ciudad::where('slug',$ciudad_slug)->first();
    
        return view('estaticas.privacidad')->with(array(
			'ciudades'=>$ciudades,
			'ciudadactual'=>$ciudadactual,
		));
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function nosotros(Request $request)
    {
        $ciudades = Ciudad::all();
        if($request->session()->has('ciudad_slug')){
            $ciudad_slug = $request->session()->get('ciudad_slug');
        }else{
            $ciudad_slug = $ciudades->first()->slug;
        }
        $ciudadactual = Ciudad::where('slug',$ciudad_slug)->first();
    
        return view('estaticas.nosotros')->with(array(
			'ciudades'=>$ciudades,
			'ciudadactual'=>$ciudadactual,
		));
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function contacto(Request $request)
    {
        $ciudades = Ciudad::all();
        if($request->session()->has('ciudad_slug')){
            $ciudad_slug = $request->session()->get('ciudad_slug');
        }else{
            $ciudad_slug = $ciudades->first()->slug;
        }
        $ciudadactual = Ciudad::where('slug',$ciudad_slug)->first();
    
        return view('estaticas.contacto')->with(array(
			'ciudades'=>$ciudades,
			'ciudadactual'=>$ciudadactual,
		));
    }
}

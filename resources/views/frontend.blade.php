@extends('base')
@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/comun.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/normalizar.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/frontend.css') }}"> 

@endsection


@section('javascripts')
<script src="{{ asset('/js/moment.js') }}"></script>
@endsection
@section('body')
<header>
    <h1>
        @if(isset($ciudadactual))
            <a href="{{ route('portada', array($ciudadactual->slug)) }}">CUPON</a>
        @else
            <a href="{{ route('inicio') }}">CUPON</a>
        @endif
    </h1>
    
    <nav>
        <ul>
            <li>
                <a href="{{ route('portada', array($ciudadactual->slug)) }}">Oferta del día</a>
            </li>
            <li>
            
                <a href="{{ url('/'.$ciudadactual->slug.'/recientes') }}">Ofertas recientes</a>
            
            </li>
            
            <li>
                <a href="{{ url('/compras') }}">Mis ofertas</a>
            </li>
            
            
            <li>@include('frontend.lista_ciudad', array('ciudadactual'=>$ciudadactual, 'ciudades'=>$ciudades))</li>
            
                   </ul>
    </nav>
</header>
<article>
    @yield('article')
</article>
<aside>
    @yield('aside')
</aside>

@endsection

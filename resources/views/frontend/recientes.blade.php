@extends('frontend')
@section('title')
Ofertas recientes en {{ $ciudadactual->nombre }}
@endsection
<div id='recientes'>
@section('article')
    <h1>Ofertas recientes en
        <strong>{{ $ciudadactual->nombre }}</strong>
    </h1>
    @if(count($ofertas)==0)
    <p>Esta ciudad todavía no ha publicado ninguna oferta</p>
    @else
    @foreach( $ofertas as $oferta) @include('frontend.minioferta')
    
    @endforeach 
    @endif
    @endsection
     @section('aside') @parent()
    @include('frontend.barra_lateral')
    @endsection
</div>
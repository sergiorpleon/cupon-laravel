@extends('frontend')
@section('title')
Detalles de {{ $oferta->nombre }}
@endsection

<div id="oferta">
    @section('article') 
        @include('oferta/oferta') 
    @endsection
</div>

@section('aside')
<section id="relacionadas">
<h2>Ofertas en otras ciudades</h2>
<ul>
@foreach( $relacionadas as $ofertax )
<li>{{ $ofertax->tienda->ciudad->nombre }}: 
    <a href="{{ url('/'.$ofertax->tienda->ciudad->slug.'/oferta/'.$ofertax->slug)}}">{{ $ofertax->nombre}}</a>
</li>
@endforeach
</ul>
</section>
@endsection
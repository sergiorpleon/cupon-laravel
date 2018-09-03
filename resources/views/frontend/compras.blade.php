@extends('frontend')
@section('title')
Últimas ofertas que has comprado
@endsection
<div id='compras'>
@section('article')
<h1>Ofertas usuario</h1>
@foreach( $compras as $compra)
<section class="oferta mini">
        <div class="descripcion">
            <h2>
                <a href="{{ route('oferta', array( $compra->oferta->ciudad->slug, $compra->oferta->slug)) }}">{{ $compra->oferta->nombre }}</a>
            </h2>
            {{ Helper::truncate($compra->oferta->descripcion, 100) }}
            <div class="estado">
                    Comprada el {{ $compra->fecha }}
            </div>
        </div>
        <div class="galeria">
            <img alt="Fotografía de la oferta" src="{{ $compra->oferta->photo }}">
            <p class="precio">{{ $compra->oferta->precio }} &euro;
                <span>{{ $compra->oferta->precio-$compra->oferta->descuento }}</span>
            </p>
            <p>Disfruta de esta oferta en
                <a href="{{ route('tienda_portada', array( $compra->oferta->ciudad->slug, $compra->oferta->tienda->slug)) }}">{{ $compra->oferta->tienda->nombre }}
                </a>
            </p>
        </div>
    </section>
@endforeach
@endsection

@section('aside')
@include('frontend.barra_lateral')
@endsection
</div>
@extends('frontend') @section('title')Cupon, cada día ofertas increíbles en tu ciudad con descuentos de hasta el
90% @endsection
<div id='portada'>
    @section('article') 
    <section class="descripcion">
        <h1>
            <p>Esta ciudad todavía no ha publicado ninguna oferta</p>
        </h1>
        
    </section> @endsection @section('aside')


    <section id="login">
        @include('usuario.caja_login')
    </section>
    <section id="cercanas">
        <h2>Ofertas en otras ciudades</h2>
        <ul>
            @if(count($cercanas)==0)
            <p>Esta ciudad todavía no ha publicado ninguna oferta</p>
            @else
            @foreach( $cercanas as $ciudad)
            <li>
                <a href="{{ url('/'.$oferta->tienda->ciudad->slug.'/recientes')}}">{{ $ciudad->nombre }}</a>
            </li>
            
            
            @endforeach
            @endif
        </ul>
    </section>
    <section id="nosotros">
        <h2>Sobre nosotros</h2>
        <p>Lorem ipsum dolor sit amet...</p>
    </section>
    @endsection
</div>
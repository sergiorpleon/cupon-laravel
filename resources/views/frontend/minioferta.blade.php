
<section class="oferta mini">
    <div class="descripcion">
        <h2>
            <a href="{{ url('/'.$oferta->tienda->ciudad->slug.'/oferta/'.$oferta->slug)}}">{{ $oferta->nombre }}</a>
        </h2>
        {!! Helper::truncate( Helper::linebreak( $oferta->tienda->descripcion ), 300) !!}
        @auth
        @if( Helper::faltan($oferta->fecha_expiracion) > 0)
        <a class="boton" href="{{ url('/'.$oferta->tienda->ciudad->slug.'/oferta/'.$oferta->slug.'/comprar')}}">Comprar</a>
        @endif
        @else
        <a class="boton" href="{{ url('/login')}}">Comprar</a>
        @endauth
        <div class="estado @if( $oferta->fecha_expiracion )expirada @endif">
                @if( Helper::faltan($oferta->fecha_expiracion) > 0 )
            <strong>Faltan</strong> {{ Helper::faltan($oferta->fecha_expiracion) }} días
            @else
            Finalizada el {{ $oferta->fecha_expiracion }}
            @endif
        </div>
    </div>
    <div class="galeria">
        <img alt="Fotografía de la oferta" src="{{$oferta->photo}}">
        <p class="precio">{{ $oferta->precio }} &euro;
            <span>{{ $oferta->precio-$oferta->descuento }}</span>
        </p>
        <p class="info">Disfruta de esta oferta en
            <a href="{{ url('/'.$oferta->tienda->ciudad->slug.'/tiendas/'.$oferta->tienda->slug) }}">{{ $oferta->tienda->nombre }}
            </a>
        </p>
    </div>
</section>
<section class="descripcion" style="width: 66%; float: left;">
<h1>
        <a href="{{ url('/'.$oferta->tienda->ciudad->slug.'/oferta/'.$oferta->slug)}}">{{ $oferta->nombre }}</a>
    </h1>
    {!! Helper::linebreak( $oferta->descripcion ) !!}
    
   
    @if (Helper::faltan($oferta->fecha_expiracion) > 0)
    <a class="boton" href="{{ url('/'.$oferta->tienda->ciudad->slug.'/oferta/'.$oferta->slug.'/comprar')}}">Comprar</a>
    @endif
    
</section>
<section class="galeria" style="width: 33%; float: left;">
    <img alt="..." src="{{$oferta->photo}}">
    <p class="precio">{{ $oferta->precio }} &euro;
        <span>{{ $oferta->descuento }}
        </span>
    </p>
    <p>
        <strong>Condiciones:</strong> {{ $oferta->condiciones }}</p>
</section>

<section style="width: -webkit-fill-available; float: left;" class="estado {% if oferta.fecha_expiracion|date:'Y m d'|expiracion < 0 %}expirada{% endif %}">
    <div style="width: 100%;">
    @if( Helper::faltan($oferta->fecha_expiracion) > 0 )
    <div class="tiempo" id="faltan" style="width: 33%; float: left;">
    
    
        <strong>Faltan</strong>: {!! Helper::faltan($oferta->fecha_expiracion) !!} días
    </div>
    <div class="compras" style="width: 33%; float: left;">
        <strong>Compras</strong>: {{ $oferta->compras }}
    </div>
    <div class="faltan" style="width: 33%; float: left;">
        @if ( Helper::resta($oferta->umbral, $oferta->compras) > 0) Faltan
        <strong>{{ $oferta->umbral-$oferta->compras}}  compras</strong>
        <br/> para activar la oferta @else
        <strong>Oferta activada</strong> por superar las
        <strong>{{ $oferta->umbral }}</strong> compras necesarias @endif
    </div>

    @else
    <div class="tiempo" style="width: 33%; float: left;">
        <strong>Finalizada</strong> el {{ $oferta->fecha_expiracion }}
    </div>
    <div class="compras" style="width: 33%; float: left;">
        <strong>Compras</strong>: {{ $oferta->compras }}
    </div>
    @endif
</div>
</section>



<section class="direccion" style="width: 33%; float: left;">
    <h2>Disfruta de la oferta en</h2>
    <p>
        <a href="{{ url('/'.$oferta->tienda->ciudad->slug.'/tiendas/'.$oferta->tienda->slug) }}">{{ $oferta->tienda->nombre }}</a>
        {!! Helper::linebreak($oferta->tienda->direccion) !!}
    </p>
</section>
<section class="tienda" style="width: 66%; float: left;">
    <h2>Sobre la tienda</h2>
    {!! Helper::truncate( Helper::linebreak( $oferta->tienda->descripcion ), 200) !!} 
</section>



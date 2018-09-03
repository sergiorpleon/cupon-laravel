@extends('frontend') 
@section('title')
Tienda {{ $tienda->nombre }}
@endsection
<div id="tienda">
@section('article')
    <section id="descripcion">
        <h1>{{ $tienda->nombre }}</h1>
        <p>{!! Helper::linebreak($tienda->descripcion) !!}</p>
    </section>
    <section id="ultimas">
        <h2>Últimas ofertas publicadas</h2>
        <table>
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Oferta</th>
                    <th>Precio</th>
                    <th>Descuento</th>
                    <th>Compras</th>
                </tr>
            </thead>
            <tbody>
                @if(count($ofertas)==0)
                
                <tr>
                    <td colspan="5">Esta tienda no ha publicado ninguna oferta</td>
                </tr>
                @else
                @foreach($ofertas as $oferta)
                <tr>
                    <td>{{ $oferta->fecha_publicacion }}</td>
                    <td>
                        <a href="{{ url('/'.$oferta->ciudad->slug.'/oferta/'.$oferta->slug) }}">{{ $oferta->nombre }}</a>
                    </td>
                    <td>{{ $oferta->precio }} &euro;</td>
                    <td>{{ $oferta->descuento }} &euro;</td>
                    <td>{{ $oferta->compras }}</td>
                    <td>
                        <ul>
                            @if($oferta->compras > 0)
                            <li>
                                <a href="{{ route('extranet_oferta_ventas',
                        array( $oferta->id )) }}">
                                    Lista de ventas
                                </a>
                            </li>
                            @endif
                            @if( $oferta->revisada == 0 )
                            <li>
                                <a href="{{ route('extranet_oferta_editar',
                        array( $oferta->id )) }}">
                                    Modificar
                                </a>
                            </li>
                            @endif
                        </ul>
                    </td>
                </tr>
                
                @endforeach
                @endif
            </tbody>
        </table>
    </section>
    @endsection
    @section('aside') 
    @parent()
    <section id="cercanas">
        <h2>Otras tiendas en {{ $tienda->ciudad->nombre }}</h2>
        <ul>
            @foreach( $cercanas as $tienda)
            <li>
                <a href="{{ route('tienda_portada', array($tienda->ciudad->slug, $tienda->slug)) }}">{{ $tienda->nombre }}</a>
            </li>

            @endforeach
        </ul>
    </section>
    @endsection
</div>
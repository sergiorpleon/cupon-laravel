@extends('extranet')
<div id='portada'>
    @section('title')Administración de {{ $user->name }}
    @endsection 
    @section('article')
    <h1>Todas tus ofertas</h1>
    <table>
        <thead>
            <tr>
                <th>Revisada</th>
                <th>Se publica</th>
                <th>Finaliza</th>
                <th>Nombre</th>
                <th>Ventas</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $ofertas as $oferta )
            <tr>
                @if( $oferta->revisada )
                <td>si</td>
                @else
                <td>no</td>
                @endif
                @if($oferta->revisada )
                <td>{{ $oferta->fecha_publicacion }}</td>
                <td>{{ $oferta->fecha_expiracion }}</td>
                @else
                <td colspan="2">Pendiente de revisión</td>
                @endif
                <td>{{ $oferta->nombre }}</td>
                <td>{{ $oferta->compras }}</td>
                <td>
                    <ul>
                        @if($oferta->compras > 0)
                        <li>
                            <a href="{{ url('/extranet/oferta/ventas/'.$oferta->slug) }}">
                                Lista de ventas
                            </a>
                        </li>
                        @endif
                        @if($oferta->revisada == 0)
                        <li>
                            <a href="{{ url('/extranet/oferta/editar/'.$oferta->slug) }}">
                                Modificar
                            </a>
                        </li>
                        @endif
                    </ul>
                </td>
            
            </tr>
            
            @endforeach
        </tbody>
    </table>
    @endsection
    
</div>
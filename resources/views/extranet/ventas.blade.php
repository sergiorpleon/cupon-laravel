@extends('extranet')
<div id='oferta' >
@section('title')Ventas de la oferta {{ $oferta->nombre }}@endsection
@section('article')
<h1>Ventas {{ $oferta->nombre }}</h1>

<table>
<thead>
<tr>
<th>DNI</th>
<th>Nombre y apellidos</th>
<th>Fecha venta</th>
</tr>
</thead>
<tbody>
@foreach( $ventas as $venta )
<tr>
<td>{{ $venta->id }}</td>
<td>{{ $venta->usuario->name }}</td>
<td>{{ $venta->fecha }}</td>
</tr>
@endforeach
<tr>
<th>TOTAL</th>
<td>{{ count($ventas) * $oferta->precio }} &euro;</td>
<td>{{ count($ventas) }} ventas</td>
</tr>
</tbody>
</table>
@endsection
</div>
<table class="table table-responsive" id="ofertas-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <!-- th>Slug</th -->
        <th>Descripcion</th>
        <th>Condiciones</th>
        <th>Photo</th>
        <th>Precio</th>
        <th>Descuento</th>
        <th>Fecha Publicacion</th>
        <th>Fecha Expiracion</th>
        <th>Compras</th>
        <th>Umbral</th>
        <th>Revisada</th>
        <th>Tienda Id</th>
        <!-- th>Ciudad Id</th -->
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($ofertas as $ofertas)
        <tr>
            <td>{!! $ofertas->nombre !!}</td>
            <!-- td>{!! $ofertas->slug !!}</td -->
            <td>{!! Helper::truncate($ofertas->descripcion, 100) !!}</td>
            <td>{!! $ofertas->condiciones !!}</td>
            <td>{!! $ofertas->photo !!}</td>
            <td>{!! $ofertas->precio !!}</td>
            <td>{!! $ofertas->descuento !!}</td>
            <td>{!! $ofertas->fecha_publicacion !!}</td>
            <td>{!! $ofertas->fecha_expiracion !!}</td>
            <td>{!! $ofertas->compras !!}</td>
            <td>{!! $ofertas->umbral !!}</td>
            <td>{!! $ofertas->revisada !!}</td>
            <td>{!! $ofertas->tienda_id !!}</td>
            <!-- td>{!! $ofertas->ciudad_id !!}</td -->
            <td>
                {!! Form::open(['route' => ['ofertas.destroy', $ofertas->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('ofertas.show', [$ofertas->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('ofertas.edit', [$ofertas->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
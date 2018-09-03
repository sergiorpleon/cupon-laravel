<table class="table table-responsive" id="tiendas-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Slug</th>
        <th>Descripcion</th>
        <th>Direccion</th>
        <th>Ciudad Id</th>
        <th>Usuario Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($tiendas as $tiendas)
        <tr>
            <td>{!! $tiendas->nombre !!}</td>
            <td>{!! $tiendas->slug !!}</td>
            <td>{!! Helper::truncate($tiendas->descripcion, 100) !!}</td>
            <td>{!! $tiendas->direccion !!}</td>
            <td>{!! $tiendas->ciudad_id !!}</td>
            <td>{!! $tiendas->usuario_id !!}</td>
            <td>
                {!! Form::open(['route' => ['tiendas.destroy', $tiendas->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('tiendas.show', [$tiendas->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('tiendas.edit', [$tiendas->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
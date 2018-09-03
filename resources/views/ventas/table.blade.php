<table class="table table-responsive" id="ventas-table">
    <thead>
        <tr>
            <th>Fecha</th>
        <th>Oferta Id</th>
        <th>Usuario Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($ventas as $ventas)
        <tr>
            <td>{!! $ventas->fecha !!}</td>
            <td>{!! $ventas->oferta_id !!}</td>
            <td>{!! $ventas->usuario_id !!}</td>
            <td>
                {!! Form::open(['route' => ['ventas.destroy', $ventas->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('ventas.show', [$ventas->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('ventas.edit', [$ventas->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
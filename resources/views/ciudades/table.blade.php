<table class="table table-responsive" id="ciudades-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Slug</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($ciudades as $ciudades)
        <tr>
            <td>{!! $ciudades->nombre !!}</td>
            <td>{!! $ciudades->slug !!}</td>
            <td>
                {!! Form::open(['route' => ['ciudades.destroy', $ciudades->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('ciudades.show', [$ciudades->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('ciudades.edit', [$ciudades->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
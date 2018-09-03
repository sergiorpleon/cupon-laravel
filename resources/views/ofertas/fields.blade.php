<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Slug Field -->
<div class="form-group col-sm-6">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Condiciones Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('condiciones', 'Condiciones:') !!}
    {!! Form::textarea('condiciones', null, ['class' => 'form-control']) !!}
</div>

<!-- Photo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('photo', 'Photo:') !!}
    {!! Form::text('photo', null, ['class' => 'form-control']) !!}
</div>

<!-- Precio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('precio', 'Precio:') !!}
    {!! Form::number('precio', null, ['class' => 'form-control']) !!}
</div>

<!-- Descuento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descuento', 'Descuento:') !!}
    {!! Form::number('descuento', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Publicacion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('fecha_publicacion', 'Fecha Publicacion:') !!}
    {!! Form::textarea('fecha_publicacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Expiracion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('fecha_expiracion', 'Fecha Expiracion:') !!}
    {!! Form::textarea('fecha_expiracion', null, ['class' => 'form-control']) !!}
</div>

<!-- Compras Field -->
<div class="form-group col-sm-6">
    {!! Form::label('compras', 'Compras:') !!}
    {!! Form::number('compras', null, ['class' => 'form-control']) !!}
</div>

<!-- Umbral Field -->
<div class="form-group col-sm-6">
    {!! Form::label('umbral', 'Umbral:') !!}
    {!! Form::number('umbral', null, ['class' => 'form-control']) !!}
</div>

<!-- Revisada Field -->
<div class="form-group col-sm-6">
    {!! Form::label('revisada', 'Revisada:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('revisada', false) !!}
        {!! Form::checkbox('revisada', '1', null) !!} 1
    </label>
</div>

<!-- Tienda Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tienda_id', 'Tienda Id:') !!}
    {!! Form::number('tienda_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Ciudad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ciudad_id', 'Ciudad Id:') !!}
    {!! Form::number('ciudad_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('ofertas.index') !!}" class="btn btn-default">Cancel</a>
</div>

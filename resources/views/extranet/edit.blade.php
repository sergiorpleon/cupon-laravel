@extends('frontend_user')

@section('article')
<div class="title-page">
	<h3>Editar Tienda.</h3>
</div>
	
@if(count($errors) > 0)
<div class="errors">
	<ul>
	@foreach($errors->all() as $error)
	<li>{{ $error }}</li>
	@endforeach
	</ul>
</div>
@endif

<form method="POST">
{{ csrf_field() }}
	<div class="form-group">
		<label for='title'>Nombre</label>
		<div class="form-controls">
			<input class="full-wudth" type="text" name="nombre" id="nombre" value="{{ $tienda->nombre }}">
		</div>
		<label for='title'>Slug</label>
		<div class="form-controls">
			<input class="full-wudth" type="text" name="slug" id="slug" value="{{ $tienda->slug}}">
		</div>
		<label for='title'>Descripcion</label>
		<div class="form-controls">
			<input class="full-wudth" type="text" name="descripcion" id="descripcion" value="{{ $tienda->descripcion}}">
		</div>
		<label for='title'>Direccion</label>
		<div class="form-controls">
			<input class="full-wudth" type="text" name="direccion" id="direccion" value="{{ $tienda->direccion}}">
		</div>
	</div>
	
<button type="submit">Editar</button>
</form>
@endsection

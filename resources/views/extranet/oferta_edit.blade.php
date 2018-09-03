@extends('frontend_user')

@section('article')
<div class="title-page">
	<h3>Editar Oferta.</h3>
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
			<input class="full-wudth" type="text" name="nombre" id="nombre" value="{{ $oferta->nombre }}">
		</div>
		<label for='title'>Slug</label>
		<div class="form-controls">
			<input class="full-wudth" type="text" name="slug" id="slug" value="{{ $oferta->slug}}">
		</div>
		<label for='title'>Descripcion</label>
		<div class="form-controls">
			<input class="full-wudth" type="text" name="descripcion" id="descripcion" value="{{ $oferta->descripcion}}">
		</div>
		<label for='title'>Condiciones</label>
		<div class="form-controls">
			<input class="full-wudth" type="text" name="condiciones" id="condiciones" value="{{ $oferta->condiciones}}">
		</div>
		<label for='title'>Foto</label>
		<div class="form-controls">
			<input class="full-wudth" type="file" name="photo" id="photo" value="{{ old('photo')}}">
		</div>
		<label for='title'>Precio</label>
		<div class="form-controls">
			<input class="full-wudth" type="text" name="precio" id="precio" value="{{ $oferta->precio}}">
		</div>
		<label for='title'>Descuento</label>
		<div class="form-controls">
			<input class="full-wudth" type="text" name="descuento" id="descuento" value="{{ $oferta->descuento}}">
		</div>
		<label for='title'>Fecha Publicacion</label>
		<div class="form-controls">
			<input class="full-wudth" type="text" name="fecha_publicacion" id="fecha_publicacion" value="{{ $oferta->fecha_publicacion}}">
		</div>
		<label for='title'>Fecha Expiracion</label>
		<div class="form-controls">
			<input class="full-wudth" type="text" name="fecha_expiracion" id="fecha_expiracion" value="{{ $oferta->fecha_expiracion}}">
		</div>
		<label for='title'>Compras</label>
		<div class="form-controls">
			<input class="full-wudth" type="text" name="compras" id="compras" value="{{ $oferta->compras}}">
		</div>
		<label for='title'>Umbral</label>
		<div class="form-controls">
			<input class="full-wudth" type="text" name="umbral" id="umbral" value="{{ $oferta->umbral}}">
		</div>
		<label for='title'>Revisada</label>
		<div class="form-controls">
			<input type="checkbox" name="revisada" id="revisada" @if($oferta->revisada == 1) checked @endif value="checked">
		</div>
		
	</div>
	
<button type="submit">Editar</button>
</form>
@endsection

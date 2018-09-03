@extends('frontend_user')

@section('article')
<div class="title-page">
	<h3>Editar Usuario.</h3>
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
			<input class="full-wudth" type="text" name="nombre" id="nombre" value="{{old('nombre')}}">
		</div>
	</div>
	
<button type="submit">Editar</button>
</form>
@endsection

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>@yield('title') | Cupon</title>
@yield('stylesheets')
</head>
<body id=""><div id="contenedor">
@yield('body')
<footer>
&copy; {{ Helper::year() }} - Cupon 
<a href="{{ route('ayuda') }}">Ayuda</a>
<a href="{{ route('contacto') }}">Contacto</a>
<a href="{{ route('privacidad') }}">Privacidad</a>
<a href="{{ route('nosotros') }}">Sobre nosotros</a>
@if (Session::has('ciudad_slug'))
 {{ Session::get('ciudad_slug') }}
@endif
</footer>
@yield('javascripts')
</div>
@yield('scripts')
</body>
</html>
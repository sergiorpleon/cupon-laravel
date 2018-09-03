@extends('base')
@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/comun.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/normalizar.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/extranet.css') }}"> 
@endsection
@section('body')
<header>
<h1><a href="{{ url('/extranet' ) }}">CUPON EXTRANET</a></h1>
<nav>
<ul>
<li><a href="{{ url('/extranet' ) }}">Ofertas</a></li>
<li><a href="{{ url('/extranet/perfil') }}">Mis datos</a></li>
<li><a href="{{ url ('/user/logout') }}">Cerrar sesión</a></li>
</ul>
</nav>
<p>Teléfono de atención al cliente <strong>902 XXX XXX</strong></p>
</header>
<article>
@yield('article')
</article>
<aside>
<a class="boton" href="{{ url('/extranet/oferta/nueva') }}">Añadir
oferta</a>
<section id="faq">
<h2>Preguntas frecuentes</h2>
<dl>
<dt>¿Lorem ipsum dolor sit amet?</dt>
<dd>Consectetur adipisicing elit, sed do eiusmod tempor.</dd>
<dt>¿Ut enim ad minim veniam?</dt>
<dd>Quis nostrud exercitation ullamco laboris nisi.</dd>
<dt>¿Excepteur sint occaecat cupidatat non proident?</dt>
<dd>Sunt in culpa qui officia deserunt mollit anim laborum.</dd>
</dl>
</section>
</aside>
@endsection
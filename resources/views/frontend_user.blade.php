@extends('base')
@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/comun.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/normalizar.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/frontend.css') }}"> 

@endsection


@section('javascripts')
<script src="{{ asset('/js/moment.js') }}"></script>
@endsection
@section('body')
<header>
    <h1>
        <a href="{{ url('/') }}">CUPON</a>
    </h1>
    
    <nav>
        <ul>   
</ul>
    </nav>
</header>
<article>
    @yield('article')
</article>
<aside>
    @yield('aside')
</aside>

@endsection

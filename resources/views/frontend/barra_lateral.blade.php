
    <section id="login">
        @include('frontend.caja_login')
    </section>
    <section id="cercanas">
        <h2>Ofertas en otras ciudades</h2>
        <ul>
            @if(count($cercanas)==0)
            <p>Esta ciudad todavía no ha publicado ninguna oferta</p>
             @else
        @foreach($cercanas as $ciudad)
        
            <li>
                <a href="{{url('/'.$ciudad->slug.'/recientes')}}">{{ $ciudad->nombre }}</a>
            </li>
            @endforeach
            @endif
        </ul>
    </section>
    <section id="nosotros">
        <h2>Sobre nosotros</h2>
        <p>Lorem ipsum dolor sit amet...</p>
    </section>
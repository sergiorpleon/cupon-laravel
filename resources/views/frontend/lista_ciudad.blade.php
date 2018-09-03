
<select id="ciudadseleccionada">
    @foreach( $ciudades as $ciudadx)
    @if( $ciudadx->id == $ciudadactual->id )
    <option selected value="{{ $ciudadx->slug }}" data-url="vcambiar}">
        {{ $ciudadx->nombre }}
    </option>
    @else
    <option  value="{{ $ciudadx->slug }}" data-url="/ciudad/cambriar-a-{{$ciudadx->slug}}">
        {{ $ciudadx->nombre }}
    </option>
    @endif
    
    
    @endforeach

</select>
<script type="text/javascript">
    var lista = document.getElementById('ciudadseleccionada');
    lista.onchange = function () {
        var url = lista.options[lista.selectedIndex].getAttribute('data-url');
        window.location = url;
    };
</script>

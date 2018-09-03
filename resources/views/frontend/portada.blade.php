@extends('frontend') 

@section('title')
Cupon, cada día ofertas increíbles en tu ciudad con descuentos de hasta el
90% 
@endsection

 
    @section('article') <div id='portada' class='oferta'>@include('frontend.oferta', array('oferta'=>$oferta))</div> @endsection
    @section('aside')

    @include('frontend.barra_lateral', array('cercanas'=>$cercanas))
    @endsection
    @section('scripts')
    <script>
            
    var a = moment();          
    //var d = new Date();
    // var d1 = moment([d.getFullYear()+"" , (d.getMonth()+1)+"" , d.getDate()+""] )
    var b = moment();          
    var c = a.diff(b, 'days');
    
    var elem = document.getElementById("faltan");
    elem.innerHTML = "<strong>Faltan</strong>: " + c + " días";
    </script>
    @endsection
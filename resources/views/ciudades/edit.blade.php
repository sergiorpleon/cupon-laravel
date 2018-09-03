@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Ciudades
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($ciudades, ['route' => ['ciudades.update', $ciudades->id], 'method' => 'patch']) !!}

                        @include('ciudades.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
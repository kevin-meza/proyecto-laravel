
@extends('layouts.app')

@section('content')

<div class="container">
    @if(Session::has('mensaje'))
    {{Session::get('mensaje')}}
    @endif
Formulario
<h1>{{$modo}}</h1>

{{-- envia los datos a laurl persona q tiene el post por store --}}
   <form action="{{url('/persona/'.$persona->id)}}" method="POST" enctype="multipart/form-data">
    {{-- llave de seguridad obligatoria --}}

    @csrf
    {{ method_field('PATCH') }}
<div class="form-group">
    <label for="nombre">Nombre:</label>
    <input type="text" class="form-control" name="nombre" id="nombre" value ="{{isset($persona->nombre)?$persona->nombre:""}}">

</div>
<div class="form-group">
    <label for="nombre">apellido:</label>
    <input type="text" class="form-control" name="apellido" id="apellido" value ="{{isset($persona->apellido)?$persona->apellido:""}}">
</div>

    <div class="form-group">
    <label for="correo">correo:</label>
    <input type="text" class="form-control" name="correo" id="correo" value ="{{isset($persona->correo)?$persona->correo:""}}">
    </div>


    <div class="form-group">
    <label for="imagen">imagen:</label>
    {{-- {{$persona->imagen}} --}}

    <input type="file" name="imagen" id="imagen" class="form-control" value="">
    @if(isset($persona->imagen))
    <img src="{{asset('storage').'/'.$persona->imagen}}" width="100" class="img-thumbnail img-fluid">

    @endif
    </div>

    <input type="submit" value="{{$modo}}" class="btn btn-success">
   </form>

   <a href="{{url('persona')}}">atras</a>

</div>
@endsection

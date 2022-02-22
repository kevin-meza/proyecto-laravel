
@extends('layouts.app')

@section('content')


Formulario
<h1>{{$modo}}</h1>

@if (count($errors)>0)
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach($errors->all() as $error)
          <li>  {{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
{{-- envia los datos a laurl persona q tiene el post por store --}}
<div class="container">
   <form action="{{url('/persona')}}" method="POST" enctype="multipart/form-data">
    {{-- llave de seguridad obligatoria --}}
    @csrf
<div class="form-group">
    <label for="nombre">Nombre:</label>
    <input type="text" class="form-control" name="nombre" id="nombre"
    value ="{{isset($persona->nombre)?$persona->nombre:old("nombre")}}">

</div>
<div class="form-group">
    <label for="nombre">apellido:</label>
    <input type="text" class="form-control" name="apellido" id="apellido" value ="{{isset($persona->apellido)?$persona->apellido:old("apellido")}}">
</div>

    <div class="form-group">
    <label for="correo">correo:</label>
    <input type="text" class="form-control" name="correo" id="correo" value ="{{isset($persona->correo)?$persona->correo:old("correo")}}">
    </div>


    <div class="form-group">
    <label for="imagen">imagen:</label>
    {{-- {{$persona->imagen}} --}}

    <input type="file" name="imagen" id="imagen" class="form-control" value="">
    @if(isset($persona->imagen))
    <img src="{{asset('storage').'/'.$persona->imagen}}" width="100" class="img-thumbnail img-fluid">

    @endif
</div><br>

    <input type="submit" value="{{$modo}}" class="btn btn-success">
   </form><br>

   <a href="{{url('persona')}}" class="btn btn-warning">atras</a>
</div>

@endsection

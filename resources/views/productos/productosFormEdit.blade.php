@extends('layouts.app')


@section('content')
{{print_r($productoEdit->nombre)}}
<div class="container">
<form action="{{url('productos/'.$productoEdit->id)}}" method="post" enctype="multipart/form-data">
@csrf
{{method_field("PATCH")}}
<div class="form-group">
  <label for="nombrep">Nombre Producto</label>
  <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="" value="{{isset($productoEdit->nombre)?$productoEdit->nombre:""}}">

</div>
<div class="form-group">
    <label for="">Descripcion</label>
    <input type="text" class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="" value="{{isset($productoEdit->descripcion)?$productoEdit->nombre:""}}">

  </div>


  <div class="form-group">
    <label for="precio">precio</label>
    <input type="number" class="form-control" name="precio" id="precio" aria-describedby="helpId" placeholder="" value="{{isset($productoEdit->precio)?$productoEdit->precio:""}}">

  </div>

  <div class="form-group">
    <label for="">Foto</label>
    <input type="file" class="form-control" name="foto" id="foto" aria-describedby="helpId" placeholder="">
    @if(isset($productoEdit->foto))
    <img src="{{asset('storage').'/'.$productoEdit->foto}}" width="100" class="img-thumbnail img-fluid">

    @endif
  </div>
<input type="submit">

</form>



</div>
@endsection

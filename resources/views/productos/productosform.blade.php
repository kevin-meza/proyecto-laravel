@extends('layouts.app')


@section('content')

<div class="container">
<form action="{{url('productos')}}" method="post" enctype="multipart/form-data">
@csrf
<div class="form-group">
  <label for="nombrep">Nombre Producto</label>
  <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="">

</div>
<div class="form-group">
    <label for="">Descripcion</label>
    <input type="text" class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="">

  </div>


  <div class="form-group">
    <label for="precio">precio</label>
    <input type="number" class="form-control" name="precio" id="precio" aria-describedby="helpId" placeholder="">

  </div>
  <div class="form-group">
    <label for="">Foto</label>
    <input type="file" class="form-control" name="foto" id="foto" aria-describedby="helpId" placeholder="">

  </div>
<input type="submit">

</form>



</div>
@endsection

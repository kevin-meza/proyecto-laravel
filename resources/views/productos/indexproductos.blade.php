@extends('layouts.app')


@section('content')

<div class="container">
    <a href="{{url('productos/create')}}" class="btn btn-success">Registrar Producto</a>
<table class="table">

    <thead>
        <tr>
            <th>nombre</th>
            <th>descripcion</th>
            <th>precio</th>
            <th>Imagen</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach ($listaProductos as $producto)
            <td>{{$producto->nombre}}</td>
            <td>{{$producto->descripcion}}</td>
            <td>{{$producto->precio}}</td>
            <td>  <img src="{{asset('storage').'/'.$producto->foto}}" alt="" srcset="" width='100' class="img-thumbnail img"></td>
            <td>
                <form action="{{url('/productos/'.$producto->id)}}" method="post" enctype="multipart/form-data" class="d-inline">
                @csrf
                {{method_field("DELETE")}}
                <input type="submit" class="btn btn-danger" value="Borrar" onclick="return confirm('quieres borrar?')">

                </form>
                <a class="btn btn-warning" href="{{url('/productos/'.$producto->id.'/edit')}}">editar </a>
        </td>



    </tbody>
    @endforeach
</table>




</div>


@endsection

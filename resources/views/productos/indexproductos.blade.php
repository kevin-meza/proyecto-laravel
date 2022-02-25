@extends('layouts.app')


@section('content')
@foreach ($listaProductos as $producto)
<div class="container">
<table class="table">
    <thead>
        <tr>
            <th>nombre</th>
            <th>descripcion</th>
            <th>precio</th>
        </tr>
    </thead>
    <tbody>
        <tr>

            <td>{{$producto->nombre}}</td>
            <td>{{$producto->descripcion}}</td>
            <td>{{$producto->precio}}</td>
            <td>
                <form action="{{url('/productos/'.$producto->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                {{method_field("DELETE")}}
                <input type="submit" class="btn btn-danger" value="Borrar" onclick="return confirm('quieres borrar?')">

                </form>
        </td>
        </tr>

    </tbody>
</table>
@endforeach



</div>


@endsection

@extends('layouts.app')

@section('content')

<div class="container">
{{-- Mostrar lista personas --}}


    @if(Session::has('mensaje'))  <div class="alert alert-success alert-dismissible" role="alert">
        <strong>{{Session::get('mensaje')}}</strong> </div>

    @endif
    </strong>
    {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span></button> --}}

<a href="{{url('persona/create')}}" class="btn btn-success">Registrar nueva Persona</a>
<table class="table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Imagen</th>

        </tr>
    </thead>
    <tbody>
        @foreach($listaPersonas as $persona)
        <tr>

            <td scope="row">{{$persona->nombre}}</td>
            <td>{{$persona->apellido}}</td>
            <td>{{$persona->correo}}</td>
            <td>
                <img src="{{asset('storage').'/'.$persona->imagen}}" alt="" srcset="" width='100' class="img-thumbnail img">
                {{-- {{$persona->imagen}} --}}
            </td>
            <td>
               <a class="btn btn-warning" href="{{url('/persona/'.$persona->id.'/edit')}}">editar </a>

            <form action="{{ url ('/persona/'.$persona->id ) }}" method="post" class="d-inline">
            @csrf
            {{method_field("DELETE")}}
            <input type="submit" class="btn btn-danger" value="Borrar" onclick="return confirm('quieres borrar?')">
            </form>
            </td>

        </tr>

        @endforeach
    </tbody>
</table>
{!! $listaPersonas->links() !!}

</div>
@endsection

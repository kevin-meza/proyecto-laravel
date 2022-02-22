
@extends('layouts.app')

@section('content')

<div class="container">
{{-- envia los datos a laurl persona q tiene el post por store --}}
   <form action="{{url('/persona')}}" method="POST" enctype="multipart/form-data">
    {{-- llave de seguridad obligatoria --}}
    @csrf

        @include('personas.form',['modo'=>'Crear'])
   </form>
</div>
   @endsection

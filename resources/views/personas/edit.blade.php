@extends('layouts.app')

@section('content')

<div class="container">
<form action="{{ url('/persona/'.$persona->id)}}"  method="POST" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}

 @include('personas.formEdit',['modo'=>'Editar'])


</form>
</div>
@endsection

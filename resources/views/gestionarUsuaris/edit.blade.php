@extends('adminlte::page')

@section('title', 'Apps&&Games')

@section('content_header')
    <h1>Taula usuaris:</h1>
@stop

@section('content')
<form action="/administrarUsuaris/{{$usuari->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="from-label">Nom  </label>
        <input id="nom" name="nom" type="text" class="form-control" tabindex="1" value = "{{$usuari->name}}" required>
    </div> 
    <div class="mb-3">
        <label for="" class="from-label">Email  </label>
        <input id="email" name="email" type="email" class="form-control" tabindex="1" value = "{{$usuari->email}}" required>
    </div>
    <div class="mb-3">
        <label for="" class="from-label">Rol </label>
        <br>
        <select id="idRol" name="idRol" required>
          @foreach ($rols as $rol)
                @if ($usuari->idRole == $rol->id)
                     <option value="{{$rol->id}}" selected>{{$rol->name}}</option>
                @else
                     <option value="{{$rol->id}}">{{$rol->name}}</option>
                @endif
          @endforeach
        </select>
    </div>

   
    <a href="/administrarUsuaris" class="btn btn-secondary" tabindex="5">Cancel·lar</a>
    <button type="submit" class="btn btn-primary"  tabindex="4">Guardar</button>
</form>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop

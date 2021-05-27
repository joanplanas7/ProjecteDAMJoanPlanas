@extends('adminlte::page')

@section('title', 'Apps&&Games')

@section('content_header')
    <h1>Afegir usuaris:</h1>
@stop

@section('content')
<form action="/administrarUsuaris" method="POST">
    @csrf
    <div class="mb-3">
        <label for="" class="from-label">Nom  </label>
        <input id="nom" name="nom" type="text" class="form-control" tabindex="1" required>
    </div> 
    <div class="mb-3">
        <label for="" class="from-label">Email  </label>
        <input id="email" name="email" type="email" class="form-control" tabindex="1" required>
    </div>

    <div class="mb-3">
        <label for="" class="from-label">Contrasenya  </label>
        <input id="contra" name="contra" type="password" class="form-control" tabindex="1" required >
    </div>
    <div class="mb-3">
        <label for="" class="from-label">Rol </label>
        <br>
        <select id="idRol" name="idRol" required>
         <option></option>
          @foreach ($rols as $rol)
                <option value="{{$rol->id}}">{{$rol->name}}</option>
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





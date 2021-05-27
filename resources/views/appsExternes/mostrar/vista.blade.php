@extends('adminlte::page')

@section('title', 'Apps&&Games')

@section('content_header')
    <h1>APLICACIONS EXTERNES:</h1>
@stop

@section('content')

<form action="/appsExternes/1" method="GET">
    @csrf
    <div class="row ">
        <input id="busqueda" name="busqueda" type="text" tabindex="4" class="col-5 botoBuscar" placeholder="Buscador">
        <div class=" col-3"><button type="submit" class="btn btn-primary"  tabindex="4" >Buscar</button></div>
    </div>
</form>

@if ($apps->isEmpty())
  <h4 class="mt-4">No hi ha resultats. </h4>
@endif

<div class="row row-cols-1 row-cols-md-2 g-4 mt-4">
@foreach ($apps as $app)
  <div class="col">
    <div class="card">
      @if ($app->urlFoto != null)
      <img src="/imgs/{{$app->urlFoto}}" class="card-img-top" alt="...">
      @endif
      <div class="card-body">
        <h5 class="card-title"><h4>{{$app->nom}}</h4></h5>
        <p class="card-text">{{$app->descripcio}}</p>
      </div>
      <div class="card-footer">
        <small class="text-muted">Penjada: {{$app->updated_at}}</small>
        <a href="{{$app->pagOficial}}" target="_blank" class="btn btn-info boto">Anar a pàgina oficial</a>
    </div>
    </div>
  </div>
  @endforeach
</div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{ asset('css/styleApps.css') }}">
  

@stop

@section('js')

@stop
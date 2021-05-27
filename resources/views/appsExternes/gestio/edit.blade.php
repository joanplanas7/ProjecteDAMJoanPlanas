@extends('adminlte::page')

@section('title', 'AppsAndGames')

@section('content_header')
    <h1>Editar aplicació:</h1>
@stop

@section('content')
<form action="/gestionarAppsExternes/{{$app->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="from-label">Nom: </label>
        <input id="nom" name="nom" type="text" class="form-control" tabindex="4" value="{{$app->nom}}" required>
    </div>
    <div class="mb-3">
        <label for="" class="from-label">Descripció: </label>
        <input id="descripcio" name="descripcio" type="text" class="form-control" tabindex="4" value="{{$app->descripcio}}" required>
    </div>
    <div class="mb-3">
        <label for="" class="from-label">Link de la pàgina oficial: </label>
        <input id="pagOficial" name="pagOficial" type="text" class="form-control" tabindex="4" value="{{$app->pagOficial}}" required>
    </div>
    
    <div class="mb-3">
        <label for="" class="from-label">Canviar la imatge: </label> <br>
        <input type="file" name="img" id="img">
    </div>


    <a href="/gestionarAppsExternes" class="btn btn-secondary" tabindex="5">Tornar</a>
    <button type="submit" class="btn btn-success"  tabindex="4">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

if ({{$error}} == 1){

    $('document').ready(function(){

            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'L\'arxiu no és una imatge'
            })
});

}
</script>
@stop
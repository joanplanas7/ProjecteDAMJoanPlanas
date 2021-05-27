@extends('adminlte::page')

@section('title', 'AppsAndGames')

@section('content_header')
    <h1>Editar Aplicació:</h1>
@stop

@section('content')
<form action="/gestionarAppsPropies/{{$app->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="from-label">Nom: </label>
        <input id="nom" name="nom" type="text" class="form-control" tabindex="4" required value="{{$app->nom}}">
    </div>
    <div class="mb-3">
        <label for="" class="from-label">Descripció: </label>
        <input id="descripcio" name="descripcio" type="text" class="form-control" tabindex="4" required value="{{$app->descripcio}}">
    </div>
    <div class="mb-3">
        <label for="" class="from-label">Exclusiva? </label>
        <br>
        @if ($app->exclusiva == "Si")
            <input type="radio" id="exclusiva" name="exclusiva" value="Si" required checked> Si <br>
            <input type="radio" id="exclusiva" name="exclusiva" value="No" required> No
        @else
            <input type="radio" id="exclusiva" name="exclusiva" value="Si" required checked> Si <br>
            <input type="radio" id="exclusiva" name="exclusiva" value="No" required checked> No
        @endif
    </div>


    <div class="mb-3">
        <label for="" class="from-label">Canviar l'arxiu: </label> <br>
        <input type="file" name="arxiu" id="arxiu">
    </div>

    <div class="mb-3">
        <label for="" class="from-label">Canviar la imatge: </label> <br>
        <input type="file" name="img" id="img">
    </div>
    <a href="/gestionarAppsPropies" class="btn btn-secondary" tabindex="5">Tornar</a>
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
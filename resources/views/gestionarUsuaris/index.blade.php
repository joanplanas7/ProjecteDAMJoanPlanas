@extends('adminlte::page')

@section('title', 'Apps&&Games')

@section('content_header')
    <h1>Taula usuaris:</h1>
@stop

@section('content')
<a href="administrarUsuaris\create" class="btn btn-primary mb-3">Afegir nou usuari: </a>

    <table id="usu" class="table table-dark table-striped shadow-lg mt-4">
        <thead class="bg-primary text-white">
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Correu</th>
            <th scope="col">Rol</th>
            <th scope="col">Accions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($usuaris as $usuari)
        <tr>
            <td>{{$usuari-> name}}</td>
            <td>{{$usuari-> email}}</td>
            <td>
            @foreach ($rols as $rol)
                @if($usuari -> idRole == $rol -> id)
                    {{$rol -> name }}
                @endif
             @endforeach
            </td>
            <td>
                <form action ="{{ route ('administrarUsuaris.destroy', $usuari->id)}}" method="POST">
                <a href="/administrarUsuaris/{{ $usuari->id}}/edit" class="btn btn-info" href="">Editar</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
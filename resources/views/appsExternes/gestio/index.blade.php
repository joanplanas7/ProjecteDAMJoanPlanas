@extends('adminlte::page')

@section('title', 'Apps&&Games')

@section('content_header')
    <h1>GESTIONAR APLICACIONS EXTERNES:</h1>
@stop

@section('content')
<a href="gestionarAppsExternes\create" class="btn btn-primary mb-3">Afegir nova aplicació externa</a>

<table id="appsExternes" class="table table-dark table-striped shadow-lg mt-4">
    <thead class="bg-primary text-white">
    <tr class="verd">
        <th scope="col">Nom</th>
        <th scope="col">Descripció </th>
        <th scope="col">Enllaç pàgina oficial </th>
        <th scope="col">Accions</th>
        
    </tr>
    </thead>
    <tbody>
    @foreach ($apps as $app)
    <tr>
        <td>{{ $app -> nom }}</td>
        <td>{{ $app -> descripcio }}</td>
        <td>{{ $app -> pagOficial }}</td>

        <td>
            <form action ="{{ route ('gestionarAppsExternes.destroy', $app->id)}}" method="POST">
                <a href="/gestionarAppsExternes/{{ $app->id}}/edit" class="btn btn-info" href="">Editar</a>
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">

@stop

@section('js')

    <script src="https://code.jquery.com/jquery-3.5.1.js"> </script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"> </script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"> </script>

    <script>
        $(document).ready(function() {
            $('#appsExternes').DataTable({
                language: {
                url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Catalan.json'
            }
            });
        });
        </script>
@stop
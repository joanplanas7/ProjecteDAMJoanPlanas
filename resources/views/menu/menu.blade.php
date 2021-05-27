@extends('adminlte::page')

@section('title', 'Apps&&Games')

@section('content_header')
    <p class="titol">Benvingut!!!</p>
@stop

@section('content')
    <p>Ara que ja estàs registrat, pots començar a descarregar les aplicacions que t'interessin. </p>
    
    <img src="img/cara.gif" alt="gif cara" class="gif"></p>  
   
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{ asset('css/styleMenu.css') }}">
@stop

@section('js')
@stop
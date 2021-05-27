@extends('adminlte::page')

@section('title', 'Apps&&Games')

@section('content_header')
    <h1>APLICACIONS PRÒPIES:</h1>
@stop

@section('content')

<form action="/appsPropies/1" method="GET">
    @csrf
    <div class="row ">
        <input id="busqueda" name="busqueda" type="text" tabindex="4" class="col-5 botoBuscar" placeholder="Buscador" >
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
      <img src="imgs/{{$app->urlFoto}}" class="card-img-top" alt="..."> 
      @endif
      <div class="card-body">
        <h5 class="card-title"><h4>{{$app->nom}}  @if($app->exclusiva=="Si")  <img src="img/corona.svg" class="icona" alt="icona corona">   @endif </h4></h5>
        <p class="card-text">{{$app->descripcio}}</p>
      </div>

      <div class="card-body valoracions"><h5>   
      
      <?php
          $puntuacioTotal = 0;
          $totalPuntuacions = 0;
      ?>
      @foreach ($val as $v)
              @if ($v->idApp == $app->id)
              <?php
                  $totalPuntuacions++;
                  $puntuacioTotal = $v->puntuacio + $puntuacioTotal;
              
              ?>
              @endif
      @endforeach
      
      <?php
          if ($totalPuntuacions == 0){
              print("Encara no hi ha valoracions. ");
          }else{
              print("La nota mitjana d'aquesta aplicació és:  " . $puntuacioTotal/$totalPuntuacions . "/10");
          }
        ?>
      </h5></div>      
      <div class="card-footer">
        <small class="text-muted">Penjada: {{$app->updated_at}}</small>
        <a href="apps/{{Crypt::encrypt($app->id)}}/descarregar" class="btn btn-success boto">Descarregar</a>
        <?php
           $votat = True;
        ?>
        @foreach ($val as $v)
          @if ($v->idApp == $app->id && $v->idUser == auth()->user()->id)
                <button class="btn btn-danger boto">Ja has valorat</button>
                <?php
                    $votat = True;
                ?>
                @break
          @else
                <?php
              $votat = False;
              ?>
          @endif 
       @endforeach

       @if ($votat == False || $val->isEmpty())
          <button class="btn btn-info boto" onclick="puntua({{$app->id}})">Valorà</button>
       @endif

       
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

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
 function puntua($idApp){
        
      Swal.fire({
        title: 'Puntua aquesta aplicació:',
        html:
        '<form action="/apps/' + $idApp + '/valorar" method="POST">'+
          '@CSRF'+
          '<select id="num" name="num" class="selectP" required>'+
              '@for($i = 1; $i < 11; $i++)'+
                '<option>{{$i}}</option>'+
            '  @endfor'+
         ' </select> <br>'+
          ' <a href="/appsPropies" class="btn btn-danger puntuacio" tabindex="5">Cancel·lar</a>'+
          '<button type="submit" class="btn btn-success puntuacio"  tabindex="4">Puntuar</button>'+
        '</form>',
        showConfirmButton:false,
    })
 }
</script>



@stop
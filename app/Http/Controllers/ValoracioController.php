<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Valoracion;

class ValoracioController extends Controller
{
    public function guardar($idApp, Request $request){
       
       $valoracio = new Valoracion(); 
       $valoracio->idApp = $idApp;
       $valoracio->idUser = auth()->user()->id;
       $valoracio->puntuacio = $request->get("num");
       $valoracio->save();
       

       return redirect("/appsPropies");
    }
}

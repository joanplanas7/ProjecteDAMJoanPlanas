<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppsExterne;
use Illuminate\Support\Facades\Storage;

class GestioAplicacionsExternesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apps = AppsExterne::all();
        return view('appsExternes.gestio.index')->with('apps', $apps);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $error = False;
        return view('appsExternes.gestio.create')->with("error", $error);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $apps = new AppsExterne();

        $apps->nom = $request->get('nom');
        $apps->descripcio = $request->get('descripcio');
        $apps->pagOficial = $request->get('pagOficial');


        if($request->hasFile("img")){
            $img = $request->file("img");
            $nomImg = "img_".time() . ".". $img->guessExtension();
            $ruta1 = public_path("imgs/".$nomImg);

            $apps->urlFoto = $nomImg;

            if($img->guessExtension() == "png" || $img->guessExtension() == "jpg"){
                copy($img, $ruta1);
            }else{
                $error = True;
                return view('appsExternes.gestio.create')->with("error", $error);
            } 
        }

        $apps->save();

        return redirect('/gestionarAppsExternes');
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $app = AppsExterne::find($id);
        $error = False;
        return view('appsExternes.gestio.edit')->with('app', $app)->with("error", $error);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $app = AppsExterne::find($id);

        $app->nom = $request->get('nom');
        $app->descripcio = $request->get('descripcio');
        $app->pagOficial = $request->get('pagOficial');

        if($request->hasFile("img")){
            $img = $request->file("img");
            $nomImg = "img_".time() . ".". $img->guessExtension();
            $ruta1 = public_path("imgs/".$nomImg);

            $app->urlFoto = $nomImg;

            if($img->guessExtension() == "png" || $img->guessExtension() == "jpg"){
                copy($img, $ruta1);
            }else{
                $error = True;
                return view('appsExternes.gestio.edit')->with("error", $error)->with('app', $app);
            } 
        }
        
        $app->save();
        return redirect('/gestionarAppsExternes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $app = AppsExterne::find($id);

        if ($app->urlFoto != null){
            $urlImgPerEliminar = public_path("imgs/" . $app->urlFoto);
            unlink($urlImgPerEliminar);
        }

       

        $app->delete();
        return redirect('/gestionarAppsExternes');
    }
}

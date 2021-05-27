<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppsPropie;
use Illuminate\Support\Facades\Storage;

class GestioAppsPropiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apps = AppsPropie::all();
        return view('appsPropies.gestio.index')->with('apps', $apps);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $error = False;
        return view('appsPropies.gestio.create')->with("error", $error);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $apps = new AppsPropie();
        $apps->nom = $request->get('nom');
        $apps->descripcio = $request->get('descripcio');
        $apps->exclusiva = $request->get('exclusiva');

        if($request->hasFile("arxiu")){
            $file = $request->file("arxiu");
            $nom = "app_".time() . ".". $file->guessExtension();
            $ruta = storage_path("app/public/apps/".$nom);

            $apps->ruta = $nom;

            copy($file, $ruta);
        }

        if($request->hasFile("img")){
            $img = $request->file("img");
            $nomImg = "img_".time() . ".". $img->guessExtension();
            $ruta1 = public_path("imgs/".$nomImg);

            $apps->urlFoto = $nomImg;

            if($img->guessExtension() == "png" || $img->guessExtension() == "jpg"){
                copy($img, $ruta1);
            }else{
                $error = True;
                return view('appsPropies.gestio.create')->with("error", $error);
            } 
        }

        $apps->save();

        return redirect('/gestionarAppsPropies');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $error = False;
        $app = AppsPropie::find($id);
        return view('appsPropies.gestio.edit')->with('app', $app)->with("error", $error);
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
        $app = AppsPropie::find($id);

        $app->nom = $request->get('nom');
        $app->descripcio = $request->get('descripcio');
        $app->exclusiva = $request->get('exclusiva');

        if($request->hasFile("arxiu")){
            $file = $request->file("arxiu");
            $nom = "app_".time() . ".". $file->guessExtension();
            $ruta = storage_path("app/public/apps/".$nom);

            $app->ruta = $nom;

            copy($file, $ruta);
        }

        if($request->hasFile("img")){
            $img = $request->file("img");
            $nomImg = "img_".time() . ".". $img->guessExtension();
            $ruta1 = public_path("imgs/".$nomImg);

            $app->urlFoto = $nomImg;

            if($img->guessExtension() == "png" || $img->guessExtension() == "jpg"){
                copy($img, $ruta1);
            }else{
                $error = True;
                return view('appsPropies.gestio.edit')->with('app', $app)->with("error", $error);
            } 
        }

        $app->save();

        return redirect('/gestionarAppsPropies');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $app = AppsPropie::find($id);
        
        if ($app->urlFoto != null){
            $urlImgPerEliminar = public_path("imgs/" . $app->urlFoto);
            unlink($urlImgPerEliminar);
        }

        $urlAppPerEliminar = storage_path("app/public/apps/" . $app->ruta);
        unlink($urlAppPerEliminar);
        //Storage::delete($urlAppPerEliminar);
       
        $app->delete();
        
        return redirect('/gestionarAppsPropies');
    }
}

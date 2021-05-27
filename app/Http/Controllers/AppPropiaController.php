<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppsPropie;
use Illuminate\Support\Facades\Crypt;
use App\Models\Valoracion;

class AppPropiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apps = AppsPropie::where("exclusiva","like","No")->get();
        $val = Valoracion::all();


        return view('appsPropies.mostrar.vista')->with('apps', $apps)->with('val', $val);
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $busqueda = "%" . $request->get("busqueda") . "%";
        $val = Valoracion::all();
        
        $apps = AppsPropie::where('nom', 'like', $busqueda)->where("exclusiva","like","No")->get();
        return view('appsPropies.mostrar.vista')->with('apps', $apps)->with('val', $val);
    }


    public function descarregar($id) {

        $id =  Crypt::decrypt($id);
        $app = AppsPropie::find($id);
        $pathsApps = storage_path("app/public/apps/" . $app->ruta);
        return response()->download($pathsApps);
    }
}

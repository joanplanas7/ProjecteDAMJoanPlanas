<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppsPropie;
use App\Models\Valoracion;

class AppsExclusivesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apps = AppsPropie::where("exclusiva","like","Si")->get();
        $val = Valoracion::all();
        return view('appsPropies.mostrar.vista')->with('apps', $apps)->with('val', $val);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $busqueda = "%" . $request->get("busqueda") . "%";
        $val = Valoracion::all();

        $apps = AppsPropie::where('nom', 'like', $busqueda)->where("exclusiva","like","Si")->get();
        return view('appsPropies.mostrar.vista')->with('apps', $apps)->with('val', $val);
    }

    
}

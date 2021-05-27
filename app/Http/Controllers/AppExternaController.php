<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppsExterne;


class AppExternaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apps = AppsExterne::all();
        return view('appsExternes.mostrar.vista')->with('apps', $apps);
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
        
        $apps = AppsExterne::where('nom', 'like', $busqueda)->get();
        return view('appsExternes.mostrar.vista')->with('apps', $apps);
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuaris = User::all();
        $rols = Role::all();
        return view('gestionarUsuaris.index')->with('usuaris',$usuaris)->with('rols',$rols);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $rols = Role::all();
        return view('gestionarUsuaris.create')->with('rols',$rols);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuaris = new User();

        $contra = Hash::make($request->contra);

        $usuaris->name = $request->get('nom');
        $usuaris->email = $request->get('email');
        $usuaris->password = $contra;
        $usuaris->idRole = $request->get('idRol');
        $usuaris->save();


        $usuaris->roles()->sync($request->get('idRol'));
        $usuaris->save();

        return redirect('/administrarUsuaris');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuaris = User::find($id);
        $rols = Role::all();
        return view('gestionarUsuaris.edit')->with('usuari',$usuaris)->with('rols',$rols);
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
        $usuaris = User::find($id);

        $usuaris->name = $request->get('nom');
        $usuaris->email = $request->get('email');
        $usuaris->idRole = $request->get('idRol');
        $usuaris->roles()->sync($request->get('idRol'));

        $usuaris->save();

        return redirect('/administrarUsuaris');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuari = User::find($id);
        $usuari->delete();
        return redirect('/administrarUsuaris');
    }
}

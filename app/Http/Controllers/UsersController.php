<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function register(Request $request) {
        $usuario = new User();
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->tipo_usuario = $request->tipo_usuario;
        $usuario->nombres = $request->nombres;
        $usuario->apellidos = $request->apellidos;
        $usuario->telefono = $request->telefono;
        $usuario->save();   
        return $usuario;
    
    }

    public function show($id){
        $usuario = User::find($id);
        return $usuario;
    }

    public function buscarUser(Request $request){
        $usuario = User::select('users.*')->where('nombres','like',"%$request->nombre%")->get();
        return $usuario;

    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Miembros;
class MiembrosController extends Controller
{
    public function register(Request $request) {
        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->tipo_usuario = $request->tipo_usuario;
        $id = $usuario->id;
        $usuario->save();
        $miembros = new Miembros();
        $miembros->nombres = $request->nombres;
        $miembros->apellidos = $request->apellidos;
        $miembros->telefono = $request->telefono;
        $miembros->correo = $request->correo;
        $miembros->user_id = $id;
        $miembros->save();   
        return $miembros + $usuario;
    
    }

    public function show($id){
        $miembros = Miembros::find($id);
        return $miembros;
    }
}

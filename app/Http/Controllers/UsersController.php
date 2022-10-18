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
        $usuario = User::where('nombres','like',"$request->nombres%")->get();
        return $usuario;

    }

    public function showAll(){
        $usuario = User::all();
        return $usuario;
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        print('se borro');
    }
    public function actualizarUsuario(Request $request){
        $usuario = User::where('email','=', $request->email)->first();
        $usuario->password = bcrypt($request->password);
        $usuario->tipo_usuario = $request->tipo_usuario;
        $usuario->nombres = $request->nombres;
        $usuario->apellidos = $request->apellidos;
        $usuario->telefono = $request->telefono;
        $usuario->update();
        return $usuario;
    }
}

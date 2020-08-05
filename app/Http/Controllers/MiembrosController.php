<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class MiembrosController extends Controller
{
    public function register(Request $request) {
        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->tipo_usuario = $request->tipo_usuario;
        $usuario->save();
        return $usuario;
    
    }
}

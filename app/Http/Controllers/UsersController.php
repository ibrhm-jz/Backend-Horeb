<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function register(Request $request)
    {
        try {
            $usuario = new User();
            $usuario->email = $request->email;
            $usuario->password = bcrypt($request->password);
            $usuario->tipo_usuario = $request->tipo_usuario;
            $usuario->nombres = $request->nombres;
            $usuario->apellidos = $request->apellidos;
            $usuario->telefono = $request->telefono;
            $usuario->save();
            return $usuario;
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 404);
        }
    }

    public function show($id)
    {
        try {
            $usuario = User::find($id);
            return $usuario;
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 404);
        }
    }

    public function buscarUser(Request $request)
    {
        try {
            $usuario = User::where('nombres', 'like', "$request->nombres%")->get();
            return $usuario;
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 404);
        }
    }

    public function showAll()
    {
        try {
            $usuario = User::all();
            return $usuario;
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 404);
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::find($id);
            $user->delete();
            print('se borro');
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 404);
        }
    }
    public function actualizarUsuario(Request $request)
    {
        try {
            $usuario = User::where('email', '=', $request->email)->first();
            $usuario->password = bcrypt($request->password);
            $usuario->tipo_usuario = $request->tipo_usuario;
            $usuario->nombres = $request->nombres;
            $usuario->apellidos = $request->apellidos;
            $usuario->telefono = $request->telefono;
            $usuario->update();
            return $usuario;
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 404);
        }
    }
}

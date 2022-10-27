<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clientes;

class ClientesController extends Controller
{

    public function register(Request $request) {
        try{
           $clientes = new Clientes();
           $clientes->nombres = $request->nombres;
           $clientes->apellidos =$request->apellidos;
           $clientes->direccion = $request->direccion;
           $clientes->telefono = $request->telefono;
           $clientes->correo = $request->correo;
           $clientes->empresa = $request->empresa;
           $clientes->users_id = $request->users_id;
           $clientes->save();
           //$id = $clientes->id;
           return $clientes;
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 404);
        }
       
    }

    public function update(Request $request, $id)
    {
        try{
           $clientes = Clientes::find($id);
           $clientes->nombres = $request->nombres;
           $clientes->apellidos = $request->apellidos;
           $clientes->direccion = $request->direccion;
           $clientes->telefono = $request->telefono;
           $clientes->correo = $request->correo;
           $clientes->empresa = $request->empresa;
           $clientes->users_id = $request->users_id;        
           $clientes->update();
           return $clientes;
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 404);
        }
    }
    public function destroy($id)
    {
        try{
           $clientes = Clientes::find($id);
           $clientes->delete();
           print('se borro');
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 404);
        }
    }

    public function show()
    {
        try{
           $clientes =  Clientes::select('clientes.nombres','clientes.apellidos','clientes.direccion',
           'clientes.telefono','clientes.correo','clientes.empresa','users.nombres AS vendedor')
           ->join('users', 'users.id', '=', 'clientes.users_id')
           ->get();
           
           return $clientes;
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 404);
        }
    }

    public function showId($id){
        try{
           $clientes = Clientes::find($id);
           return $clientes;
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 404);
        }
    }

    public function buscarClientes(Request $request){
        try{
           $nombre = strtolower($request->nombres);
           $clientes =  Clientes::select('clientes.nombres','clientes.id','clientes.apellidos','clientes.direccion',
           'clientes.telefono','clientes.correo','clientes.empresa','users.nombres AS vendedor')
           ->join('users', 'users.id', '=', 'clientes.users_id')
           ->whereRaw('lower(clientes.nombres) like (?)',["{$nombre}%"])
        //    ->where('clientes.nombres','like',"$nombre%")
           ->get();
           return $clientes;
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 404);
        }
    }
    public function MisClientes(Request $request){
      try{
          $clientes =  Clientes::select('clientes.nombres','clientes.apellidos','clientes.direccion',
          'clientes.telefono','clientes.correo','clientes.empresa','users.nombres AS vendedor')
          ->join('users', 'users.id', '=', 'clientes.users_id')
          ->where('clientes.users_id','=',$request->user_id)->get();
          return $clientes;
       } catch (\Throwable $th) {
            return response()->json([
               'message' => $th->getMessage()
            ], 404);
       }

    }
}

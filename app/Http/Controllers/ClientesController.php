<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clientes;

class ClientesController extends Controller
{

    public function register(Request $request) {
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
       
    }

    public function update(Request $request, $id)
    {
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
    }
    public function destroy($id)
    {
        $clientes = Clientes::find($id);
        $clientes->delete();
        print('se borro');
    }

    public function show()
    {
        $clientes =  Clientes::select('clientes.nombres','clientes.apellidos','clientes.direccion',
        'clientes.telefono','clientes.correo','clientes.empresa','users.nombres AS vendedor')
        ->join('users', 'users.id', '=', 'clientes.users_id')
        ->get();
        return $clientes;
    }

    public function showId($id){
        $clientes = Clientes::find($id);
        return $clientes;
    }

    public function buscarClientes(Request $request){
        $clientes =  Clientes::select('clientes.nombres','clientes.apellidos','clientes.direccion',
        'clientes.telefono','clientes.correo','clientes.empresa','users.nombres AS vendedor')
        ->join('users', 'users.id', '=', 'clientes.users_id')
        ->where('clientes.nombres','ilike',"$request->nombres%")
        ->get();
        return $clientes;

    }
    public function MisClientes(Request $request){
        
        $clientes =  Clientes::select('clientes.nombres','clientes.apellidos','clientes.direccion',
        'clientes.telefono','clientes.correo','clientes.empresa','users.nombres AS vendedor')
        ->join('users', 'users.id', '=', 'clientes.users_id')
        ->where('clientes.users_id','=',$request->user_id)->get();
        return $clientes;
        

    }
}

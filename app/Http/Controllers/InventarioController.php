<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventario;

class InventarioController extends Controller
{
    public function register(Request $request) {
        $inventario = new Inventario();
        $inventario->concepto = $request->concepto;
        $inventario->entradas = $request->entradas;
        $inventario->salidas = $request->salidas;
        $inventario->existencia = $request->existencia;
        $inventario->save();
        
        return $inventario;
    }

    public function update(Request $request, $id)
    {
        $inventario = Inventario::find($id);
        $inventario->concepto = $request->concepto;
        $inventario->entradas = $request->entradas;
        $inventario->salidas = $request->salidas;
        $inventario->existencia = $request->existencia;
        $inventario->update();
        return $inventario;
    }

    public function show(){
        $inventario = Inventario::orderBy('concepto')->get();
        return $inventario;
    }

    public function showId($id){
        $inventario = Inventario::find($id);
        return $inventario;
    }

    public function destroy($id)
    {
        $inventario= Inventario::find($id);
        $inventario->delete();
        print('se borro');
    }
    public function buscarInventario(Request $request){
        $inventario = Inventario::where('concepto','ilike',"$request->concepto%")->orderBy('concepto')->get();
        return $inventario;

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productos;

class ProductosController extends Controller
{
    public function register(Request $request) {
        $productos = new Productos();
        #0 ES ACTIVO, 1 ES INACTIVO
        $productos->nombre = $request->nombre;
        $productos->medida = $request->medida;
        $productos->categoria = $request->categoria;
        $productos->precio_unitario = $request->precio_unitario;
        $productos->cantidad_existencia = $request->cantidad_existencia;
        $productos->save();
        $id = $productos->id;
        printf($id);
        return $productos;
    }


    public function update(Request $request, $id)
    {
        $productos = Productos::find($id);
        $productos->nombre = $request->nombre;
        $productos->medida = $request->medida;
        $productos->categoria = $request->categoria;
        $productos->precio_unitario = $request->precio_unitario;
        $productos->cantidad_existencia = $request->cantidad_existencia;
        $productos->update();
        return $productos;
    }
    public function show(){
        $productos = Productos::all()->sortByDesc('nombre');
        return $productos;
    }
    public function destroy($id)
    {
        $producto = Productos::find($id);
        $producto->delete();
        print('se borro');
    }


    public function buscarProductos(Request $request){
        $producto = Productos::where('nombre','ilike',"$request->nombre%")->orderBy('nombre')->get();
        return $producto;

    }
    public function filtroCategoria(Request $request){ 
        $producto = Productos::where('categoria','=',$request->categoria)->get();
        return $producto;
       

    }
}

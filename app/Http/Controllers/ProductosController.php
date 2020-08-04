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
        $productos->tipo =$request->tipo;
        $productos->medida = $request->medida;
        $productos->descripcion = $request->descripcion;
        $productos->precio_unitario = $request->precio_unitario;
        $productos->save();
        $id = $productos->id;
        printf($id);
       
    }
}

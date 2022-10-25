<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productos;

class ProductosController extends Controller
{
    public function register(Request $request)
    {
        try {
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
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 404);
        }
    }


    public function update(Request $request, $id)
    {
        try {
            $productos = Productos::find($id);
            $productos->nombre = $request->nombre;
            $productos->medida = $request->medida;
            $productos->categoria = $request->categoria;
            $productos->precio_unitario = $request->precio_unitario;
            $productos->cantidad_existencia = $request->cantidad_existencia;
            $productos->update();
            return $productos;
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 404);
        }
    }
    public function show()
    {
        try {
            $productos = Productos::orderBy('nombre')->get();
            return $productos;
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 404);
        }
    }

    public function showId($id)
    {
        try {
            $productos = Productos::find($id);
            return $productos;
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 404);
        }
    }
    public function destroy($id)
    {
        try {
            $producto = Productos::find($id);
            $producto->delete();
            print('se borro');
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 404);
        }
    }


    public function buscarProductos(Request $request)
    {
        try {
            $producto = Productos::where('nombre', 'like', "$request->nombre%")->orderBy('nombre')->get();
            return $producto;
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 404);
        }
    }
    public function filtroCategoria(Request $request)
    {
        try {
            $producto = Productos::where('categoria', '=', $request->categoria)->get();
            return $producto;
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 404);
        }
    }

    public function cambiarPrecio(Request $request){
        try {
            $productos = Productos::all();
            foreach ($productos as $index => $producto) {
                if ($request->precio_unitario != null) {
                    $producto->precio_unitario = $producto->precio_unitario + $request->precio_unitario;
                    $producto->update();
                } else {
                    $porcentajedecimal = $request->porcentaje/100;
                    $cantidadsumar = $producto->precio_unitario * $porcentajedecimal;
                    $producto->precio_unitario = $producto->precio_unitario + $cantidadsumar;
                    $producto->update();
                }
            } return response("Editado con exito", 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 404);
        }   
        
        
    }

    public function cambiarPrecioPorLista(Request $request){
        try {
            foreach ($request->lista as $index => $idProducto) {
                $miproducto = Productos::find($idProducto);
                if ($request->precio_unitario != null) {
                    $miproducto->precio_unitario = $miproducto->precio_unitario + $request->precio_unitario;
                    $miproducto->update();
                } else {
                    $porcentajedecimal = $request->porcentaje/100;
                    $cantidadsumar = $miproducto->precio_unitario * $porcentajedecimal;
                    $miproducto->precio_unitario = $miproducto->precio_unitario + $cantidadsumar;
                    $miproducto->update();
                }
                
            }
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 404);
        }
    }

    public function cambiarPrecioPorCategoria(Request $request){
        try {
            $productos = Productos::where('categoria', '=', $request->categoria)->get();
            foreach ($productos as $index => $producto) {
                if ($request->precio_unitario != null) {
                    $producto->precio_unitario = $producto->precio_unitario + $request->precio_unitario;
                    $producto->update();
                } else {
                    $porcentajedecimal = $request->porcentaje/100;
                    $cantidadsumar = $producto->precio_unitario * $porcentajedecimal;
                    $producto->precio_unitario = $producto->precio_unitario + $cantidadsumar;
                    $producto->update();
                }                
            }
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 404);
        }
    }
}

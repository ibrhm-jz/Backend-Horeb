<?php

namespace App\Http\Controllers;

use App\Categorias;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function registrarCategoria(Request $datos)
    {
        try {
            $modelocategoria = new Categorias();
            $modelocategoria->nombre = $datos->nombre;
            $modelocategoria->save();
            return $modelocategoria;
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 404);
        }
    }

    public function editarCategoria(Request $datos, $id)
    {
        try {
            $categoria = Categorias::find($id);
            $categoria->nombre = $datos->nombre;
            $categoria->update();
            return $categoria;
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 404);
        }
    }

    public function obtenerListaCategoria()
    {
        try {
            $lista = Categorias::all();
            return $lista;
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 404);
        }
    }

    public function obtenerUnaCategoria($id)
    {
        try {
            $categoria = Categorias::find($id);
            return $categoria;
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 404);
        }
    }

    public function eliminarCategoria($id)
    {
        try {
            $categoria = Categorias::find($id);
            $categoria->delete();
            return response()->json([
                'message' => 'Se elimino con exito',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 404);
        }
    }
}

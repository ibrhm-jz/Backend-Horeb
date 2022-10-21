<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventario;

class InventarioController extends Controller
{
    public function register(Request $request)
    {
        try {
            $inventario = new Inventario();
            $inventario->concepto = $request->concepto;
            $inventario->entradas = $request->entradas;
            $inventario->salidas = $request->salidas;
            $inventario->existencia = $request->existencia;
            $inventario->save();

            return $inventario;
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $inventario = Inventario::find($id);
            $inventario->concepto = $request->concepto;
            $inventario->entradas = $request->entradas;
            $inventario->salidas = $request->salidas;
            $inventario->existencia = $request->existencia;
            $inventario->update();
            return $inventario;
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 404);
        }
    }

    public function show()
    {
        try {
            $inventario = Inventario::all();
            return $inventario;
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 404);
        }
    }

    public function showId($id)
    {
        try {
            $inventario = Inventario::find($id);
            return $inventario;
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 404);
        }
    }

    public function destroy($id)
    {
        try {
            $inventario = Inventario::find($id);
            $inventario->delete();
            print('se borro');
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 404);
        }
    }
    public function buscarInventario(Request $request)
    {
        try {
            $inventario = Inventario::where('concepto', 'like', "$request->concepto%")->orderBy('concepto')->get();
            return $inventario;
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 404);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entregas;

class EntregasController extends Controller
{
    public function register(Request $request)
    {
        try {
            $entregas = new Entregas();
            $entregas->lugar_entrega = $request->lugar_entrega;
            $entregas->fecha_entrega = $request->fecha_entrega;
            $entregas->ubicacion_entrega = $request->ubicacion_entrega;
            $entregas->status_entrega = $request->status_entrega;
            $entregas->descripcion = $request->descripcion;
            $entregas->responsable_entrega = $request->responsable_entrega;
            $entregas->miembro_id = $request->miembro_id;
            $entregas->save();
            //$id = $entregas->id;
            return $entregas;
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $entregas = Entregas::find($id);
            $entregas->lugar_entrega = $request->lugar_entrega;
            $entregas->fecha_entrega = $request->fecha_entrega;
            $entregas->ubicacion_entrega = $request->ubicacion_entrega;
            $entregas->status_entrega = $request->status_entrega;
            $entregas->descripcion = $request->descripcion;
            $entregas->responsable_entrega = $request->responsable_entrega;
            $entregas->miembro_id = $request->miembro_id;
            $entregas->update();
            return $entregas;
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 404);
        }
    }

    public function show()
    {
        try {
            $entregas = Entregas::all();
            return $entregas;
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 404);
        }
    }
    public function destroy($id)
    {
        try {
            $entregas = Entregas::find($id);
            $entregas->delete();
            print('se borro');
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 404);
        }
    }
}

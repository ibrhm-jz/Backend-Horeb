<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;

class EmpresaController extends Controller
{


    public function register(Request $request)
    {
        try {
            $empresa = new Empresa();
            #0 ES ACTIVO, 1 ES INACTIVO
            $empresa->nombre = $request->nombre;
            $empresa->clabe_interbancaria = $request->clabe_interbancaria;
            $empresa->rfc = $request->rfc;
            $empresa->correo = $request->correo;
            $empresa->direccion = $request->direccion;
            $empresa->save();
            $id = $empresa->id;
            printf($id);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $empresa = Empresa::find($id);
            $empresa->nombre = $request->nombre;
            $empresa->clabe_interbancaria = $request->clabe_interbancaria;
            $empresa->rfc = $request->rfc;
            $empresa->correo = $request->correo;
            $empresa->update();
            return $empresa;
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 404);
        }
    }

    public function show()
    {
        try {
            $empresa = Empresa::all();
            return $empresa;
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 404);
        }
    }
}

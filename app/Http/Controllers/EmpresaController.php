<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Empresa;

class EmpresaController extends Controller
{


    public function register(Request $request) {
        $empresa = new Empresa();
        #0 ES ACTIVO, 1 ES INACTIVO
        $empresa->nombre = $request->nombre;
        $empresa->clabe_interbancaria =$request->clabe_interbancaria;
        $empresa->rfc = $request->rfc;
        $empresa->correo = $request->correo;
        $empresa->save();
        $id = $empresa->id;
        printf($id);
       
    }

    public function update(Request $request, $id)
    {
        $empresa = Empresa::find($id);
        $empresa->nombre = $request->nombre;
        $empresa->clabe_interbancaria = $request->clabe_interbancaria;
        $empresa->rfc = $request->rfc;
        $empresa->correo = $request->correo;
        $empresa->update();
        return $empresa;
    }

    public function show(){
        $empresa = Empresa::all();
        return $empresa;
    }

    
}

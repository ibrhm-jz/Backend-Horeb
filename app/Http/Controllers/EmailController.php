<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\sendMail;
use App\User;
use Illuminate\Support\Facades\Mail as FacadesMail;

class EmailController extends Controller
{

    public function solicitarActivacion(Request $request)
    {
        try {
            $mensaje = $request->mensaje;
            $correo = $request->correo;
            $nombre = $request->nombre;
            FacadesMail::to("tuberia_horeb@hotmail.com")->send(new sendMail($mensaje, $correo, $nombre));
            return response()->json([
                'mensaje' => $mensaje
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 404);
        }
    }
}

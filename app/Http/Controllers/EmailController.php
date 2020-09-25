<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\sendMail;
use App\User;

class EmailController extends Controller
{
    
    public function solicitarActivacion(Request $request){
        $mensaje = $request->mensaje;
        $correo = $request->correo;
        $nombre = $request->nombre;
        Mail::to("tuberia_horeb@hotmail.com")->send(new sendMail($mensaje,$correo,$nombre));
        
        return response()->json([
            'mensaje' => $mensaje
            
            ], 200);
    }

}

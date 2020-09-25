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
        Mail::to($correo)->send(new sendMail($mensaje,$correo));
        
        return response()->json([
            'mensaje' => $mensaje
            
            ], 200);
    }

}

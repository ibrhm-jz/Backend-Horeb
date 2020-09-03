<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ventas;

class VentasController extends Controller
{
    public function register(Request $request)
    {
       $json = request()->all();
       $num_venta_actual =  Ventas::max('no_venta');
       if($num_venta_actual==null){
           $num_venta_actual=1;
       }else{
           $num_venta_actual = $num_venta_actual+1;
       }        
       for ($i=0; $i <sizeof($json) ; $i++) { 
        $venta = new Ventas();
        $venta->nombre = $json[$i]['nombre'];
        $venta->direccion = $json[$i]['direccion'];
        $venta->ciudad = $json[$i]['ciudad'];
        $venta->medida = $json[$i]['medida'];
        $venta->descripcion = $json[$i]['descripcion'];
        $venta->total= $json[$i]['total'];
        $venta->status= $json[$i]['status'];
        $venta->costo_flete= $json[$i]['costo_flete'];
        $venta->ganancia= $json[$i]['ganancia'];
        $venta->cantidad = $json[$i]['cantidad'];
        $venta->user_id = $json[$i]['user_id'];
        $venta->no_venta = $num_venta_actual;
        $venta->save();
       }
       $ventas = Ventas::all();
       return $ventas;
    }
}

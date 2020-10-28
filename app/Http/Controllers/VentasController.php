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
        $venta->direccion = $json[$i]['telefono'];
        $venta->medida = $json[$i]['medida'];
        $venta->descripcion = $json[$i]['descripcion'];
        $venta->producto_id = $json[$i]['producto_id'];
        $venta->status= $json[$i]['status'];
        $venta->costo_flete= $json[$i]['costo_flete'];
        $venta->ganancia= $json[$i]['ganancia'];
        $venta->precio_unitario= $json[$i]['precio_unitario'];
        $venta->cantidad = $json[$i]['cantidad'];
        $venta->user_id = $json[$i]['user_id'];
        $venta->no_venta = $num_venta_actual;
        $venta->save();
       }
       $ventas = Ventas::all();
       return $ventas;
    }


    public function updated(Request $request)
    {
        $json = request()->all();
      
       for ($i=0; $i <sizeof($json) ; $i++) { 
        $venta = new Ventas();
        $venta->no_venta =$json[$i]['no_venta'];
        $venta->nombre = $json[$i]['nombre'];
        $venta->direccion = $json[$i]['direccion'];
        $venta->ciudad = $json[$i]['ciudad'];
        $venta->telefono = $json[$i]['telefono'];
        $venta->medida = $json[$i]['medida'];
        $venta->descripcion = $json[$i]['descripcion'];
        $venta->producto_id = $json[$i]['producto_id'];
        $venta->status= $json[$i]['status'];
        $venta->costo_flete= $json[$i]['costo_flete'];
        $venta->ganancia= $json[$i]['ganancia'];
        $venta->precio_unitario= $json[$i]['precio_unitario'];
        $venta->cantidad = $json[$i]['cantidad'];
        $venta->user_id = $json[$i]['user_id'];
      
        $venta->save();
       }
       $ventas = Ventas::all();
       return $ventas;
    }
    public function numeroCot(){
        $ventas = Ventas::max('no_venta');
           
        return response()->json(['nocotizacion' => $ventas]);
    }

    public function searchVenta(Request $request){ 
        $venta = Ventas::where('no_venta','=',$request->no_venta)->get();
        return $venta;
       

    }

    public function destroy($id){ 
        $venta = Ventas::where('no_venta','=',$id)->delete();
        print('se borro');
        
       

    }

    public function update(Request $request, $id)
    {
        $json = request()->all();
        $venta = Ventas::where('no_venta','=',$request->$id);
        for ($i=0; $i <sizeof($json) ; $i++) { 
            
            $venta->nombre = $json[$i]['nombre'];
            $venta->direccion = $json[$i]['direccion'];
            $venta->ciudad = $json[$i]['ciudad'];
            $venta->telefono = $json[$i]['telefono'];
            $venta->medida = $json[$i]['medida'];
            $venta->descripcion = $json[$i]['descripcion'];
            $venta->producto_id = $json[$i]['producto_id'];
            $venta->status= $json[$i]['status'];
            $venta->costo_flete= $json[$i]['costo_flete'];
            $venta->ganancia= $json[$i]['ganancia'];
            $venta->precio_unitario= $json[$i]['precio_unitario'];
            $venta->cantidad = $json[$i]['cantidad'];
            $venta->user_id = $json[$i]['user_id'];
            $venta->update();
           }
       
        return $venta;
    }
}

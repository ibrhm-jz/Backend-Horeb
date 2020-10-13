<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    protected $fillable = [
        'id','no_venta','nombre','direccion','telefono', 'ciudad', 'medida','descripcion','status',
        'costo_flete','ganancia','user_id','producto_id','precio_unitario'
    ];
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
}

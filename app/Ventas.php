<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    protected $fillable = [
        'id','no_venta','nombre','direccion', 'ciudad', 'medida','descripcion','total','empresa_id','status',
        'costo_flete','ganancia','user_id'
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

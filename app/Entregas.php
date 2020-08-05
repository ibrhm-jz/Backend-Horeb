<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entregas extends Model
{
    protected $fillable = [
        'id','lugar_entrega','fecha_entrega', 'ubicacion_entrega', 'status_entrega','descripcion','responsable_entrega',
        'miembro_id'
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

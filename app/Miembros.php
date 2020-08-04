<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Miembros extends Model
{
    protected $fillable = [
        'nombres','apellidos', 'telefono', 'correo','user_id'
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

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Clientes extends Model
{
    use Notifiable;
    
    protected $fillable = [
        'id','nombres','apellidos','direccion', 'telefono', 'correo','empresa','users_id'
    ];

    public function getJWTIdentifier()
    {
        //Esto es para el token
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
    
    //
}

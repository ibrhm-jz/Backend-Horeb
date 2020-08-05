<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Clientes extends Model
{
    use Notifiable;
  
    
    protected $fillable = [
        'nombres','apellidos','direccion', 'telefono', 'correo','empresa','users_id'
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
    
    //
}

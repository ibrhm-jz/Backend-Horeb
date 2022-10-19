<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Categorias extends Model
{
    use Notifiable;
    
    protected $fillable = [
        'id','nombre'
    ];
}

<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Vehiculo extends Authenticatable
{
    protected $table = 'vehiculos';

    protected $fillable = [
        'img','nombre','marca','precio',
    ];

}

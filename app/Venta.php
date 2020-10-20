<?php

namespace App;

use App\User;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Venta extends Authenticatable
{
    protected $table = 'ventas';

    protected $fillable = [
        'users_id','vehiculos_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','users_id','id');
    }

    public function car()
    {
        return $this->belongsTo('App\Vehiculo','vehiculos_id','id');
    }
}

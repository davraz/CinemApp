<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}

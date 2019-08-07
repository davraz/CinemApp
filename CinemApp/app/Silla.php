<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Silla extends Model
{
    public function sala()
    {
        return $this->belongsTo(Sala::class);
    }

    public function reservas()
    {
        return $this->belongsToMany(Reserva::class);
    }

    public function getPrecioAttribute()
    {
        return $this->esGeneral ? 8000 : 12000;
    }

    public function getEsGeneralAttribute()
    {
        return $this->tipo == 'General';
    }
}

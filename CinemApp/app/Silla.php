<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Silla extends Model
{
    public function sala()
    {
        return $this->belongsTo(Sala::class);
    }

    public function sillas()
    {
        return $this->hasMany(Reserva::class);
    }

    public function getPrecioAttribute()
    {
        return $this->tipo == 'General' ? 8000 : 12000;
    }
}

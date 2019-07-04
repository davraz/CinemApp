<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    public function funciones()
    {
        return $this->hasMany(Funcion::class);
    }

    public function sillas()
    {
        return $this->hasMany(Silla::class);
    }
}

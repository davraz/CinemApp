<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    //
    public function funciones()
    {
        return $this->hasMany(Funcion::class);
    }
}

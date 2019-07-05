<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    public function funcion()
    {
        return $this->belongsTo(Funcion::class);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function silla()
    {
        return $this->belongsTo(Silla::class);
    }

    public function pagada()
    {
        return $this->estado == 'Pagada';
    }
}

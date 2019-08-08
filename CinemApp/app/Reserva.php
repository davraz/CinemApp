<?php

namespace App;

use Carbon\Carbon;
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

    public function sillas()
    {
        return $this->belongsToMany(Silla::class);
    }

    public function getPagadaAttribute()
    {
        return $this->estado == 'Pagada';
    }

    public function getSillasCountAttribute()
    {
        return $this->sillas->count();
    }

    public function getTotalAttribute()
    {
        $total = 0;
        foreach ($this->sillas as $silla)
        {
            $total += $silla->precio;
        }
        return $total;
    }

      public function pagar()
    {
        $this->estado = 'Pagada';
        $this->save();
    }
}

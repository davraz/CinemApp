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

    public function getTotalAttribute()
    {
        return $this->silla_count * $this->silla->precio;
    }

    public function getFechaConFormatoAttribute()
    {
        return Carbon::parse($this->funcion->hora_inicio)
            ->format('Y-m-d');
    }

    public function getHoraConFormatoAttribute()
    {
        return Carbon::parse($this->funcion->hora_inicio)
            ->format('h:i A');
    }

    public function pagar()
    {
        $this->estado = 'Pagada';
        $this->save();
    }
}

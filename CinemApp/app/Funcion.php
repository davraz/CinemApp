<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Funcion extends Model
{
    protected $table = 'funciones';

    public function pelicula()
    {
        return $this->belongsTo(Pelicula::class);
    }

    public function sala()
    {
        return $this->belongsTo(Sala::class);
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

    public function getFechaConFormatoAttribute()
    {
        return Carbon::parse($this->hora_inicio)
        ->format('Y-m-d');
    }

    public function getHoraConFormatoAttribute()
    {
        return Carbon::parse($this->hora_inicio)
            ->format('h:i A');
    }

    public function getSalaHoraAttribute()
    {
        return "Sala: " . $this->sala->numero . " - "
            . Carbon::parse($this['hora_inicio'])->format('h:i A');
    }
}

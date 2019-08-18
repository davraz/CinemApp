<?php

namespace App;

use Carbon\Carbon;
use DateTime;
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

    public function getHorasParaIniciarAttribute()
    {
        $now = new Datetime();
        $inicio = new DateTime($this->hora_inicio);
        $diff = $inicio->diff($now);

        $horas = ($diff->days*24) + $diff->h + ($diff->m/60);

        return $horas;
    }

    public function getReservaPorUsuario($usuario)
    {
        $reserva = $this->reservas
            ->where('usuario_id', $usuario->id)->first();

        if ($reserva == null) {
            $reserva = new Reserva;

            $reserva->estado = 'Pendiente';
            $reserva->funcion_id = $this->id;
            $reserva->usuario_id = $usuario->id;

            $reserva->save();
        }

        return $reserva;
    }

    public function getSillasReservadas($usuario)
    {
        return Silla::whereHas('reservas', function ($query) use ($usuario) {
            $query->where('funcion_id', $this->id)
                ->where('usuario_id', $usuario->id);
        })->get();
    }

    public function getSillasOcupadas($usuario)
    {
        return Silla::whereHas('reservas', function ($query) use ($usuario) {
            $query->where('funcion_id', $this->id)
                ->where('usuario_id', '!=', $usuario->id);
        })->get();
    }
}

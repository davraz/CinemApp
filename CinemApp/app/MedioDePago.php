<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedioDePago extends Model
{
    protected $table = 'mediosdepago';

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function getInfoAttribute()
    {
        return $this->esTarjetaDeCredito
            ? $this->numero : "Tarjeta de Cine";
    }

    public function getEsTarjetaDeCreditoAttribute()
    {
        return $this->tipo == "TarjetaDeCredito";
    }

    public function tieneSaldoSuficiente($compra)
    {
        return $this->saldo > $compra;
    }

    public function pagar($reserva)
    {
        $compra = $reserva->total;

        if ($this->tieneSaldoSuficiente($compra)) {
            $this->saldo = $this->saldo - $compra;
            $this->save();

            $reserva->pagar();
        }
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedioDePago extends Model
{
    protected $table = 'mediosdepago';

    public function usuario()
    {
        $this->belongsTo(Usuario::class);
    }

    public function tieneSaldoSuficiente($compra)
    {
        return $this->saldo > $compra;
    }

    public function pagar($reserva)
    {
        $compra = $reserva->silla->precio;

        if ($this->tieneSaldoSuficiente($compra)) {
            $this->saldo = $this->saldo - $compra;
            $this->save();

            $reserva->pagar();
        }
    }
}

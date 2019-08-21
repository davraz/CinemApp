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

    public function asignarSillas()
    {
        $this->sillas()->delete();

        $letras = range('A','Z');

        for ($i = 1; $i <= $this->filas; $i++)
        {
            for ($j = 1; $j <= $this->columnas; $j++)
            {
                $tipo = $i <= $this->filas - 2 ? 'General' : 'Preferencial';

                Silla::insert([
                    'letra' => $letras[$i - 1],
                    'numero' => $j,
                    'tipo' => $tipo,
                    'sala_id' => $this->id
                ]);
            }
        }
    }
}

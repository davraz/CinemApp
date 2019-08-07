<?php

use App\Sala;
use App\Silla;
use Illuminate\Database\Seeder;

class SillasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $salas = Sala::all();

        $letras = range('A','Z');

        foreach ($salas as $sala)
        {
            for ($i = 1; $i <= $sala->filas; $i++)
            {
                for ($j = 1; $j <= $sala->columnas; $j++)
                {
                    $tipo = $i <= $sala->filas - 2 ? 'General' : 'Preferencial';

                    Silla::insert([
                        'letra' => $letras[$i - 1],
                        'numero' => $j,
                        'tipo' => $tipo,
                        'sala_id' => $sala->id
                    ]);
                }
            }
        }
    }
}

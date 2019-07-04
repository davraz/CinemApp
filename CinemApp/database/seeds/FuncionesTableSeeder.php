<?php

use App\Funcion;
use App\Pelicula;
use App\Sala;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class FuncionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $peliculas = $this->getPeliculas();
        $salas = $this->getSalas();

        foreach($peliculas as $pelicula)
        {
            foreach ($salas as $sala)
            {
                Funcion::insert([
                    'pelicula_id' => $pelicula->id,
                    'sala_id' => $sala->id,
                    'hora_inicio' => Carbon::tomorrow()->addHours(8),
                    'hora_fin' => Carbon::tomorrow()->addHours(10)
                ]);

                Funcion::insert([
                    'pelicula_id' => $pelicula->id,
                    'sala_id' => $sala->id,
                    'hora_inicio' => Carbon::tomorrow()->addHours(16),
                    'hora_fin' => Carbon::tomorrow()->addHours(18)
                ]);
            }
        }
    }

    private function getPeliculas()
    {
        return Pelicula::all();
    }

    private function getSalas()
    {
        return Sala::all();
    }
}

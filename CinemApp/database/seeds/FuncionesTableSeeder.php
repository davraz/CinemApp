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
                    'hora_inicio' => Carbon::now(),
                    'hora_fin' => Carbon::now()
                ]);

                Funcion::insert([
                    'pelicula_id' => $pelicula->id,
                    'sala_id' => $sala->id,
                    'hora_inicio' => Carbon::now(),
                    'hora_fin' => Carbon::now()
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

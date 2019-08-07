<?php

use App\Funcion;
use App\Reserva;
use App\Silla;
use App\Usuario;
use Illuminate\Database\Seeder;

class ReservasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estados = array(
            'Pendiente',
            'Pagada',
        );

        $usuarios = $this->getUsuarios();
        $funciones = $this->getFunciones();

        foreach($usuarios as $usuario)
        {
            foreach ($funciones as $funcion)
            {
                $sillasID = $this->getRandomSillas($funcion);

                $key = array_rand($estados);
                $estado = $estados[$key];

                $reserva = new Reserva;

                $reserva->estado = $estado;
                $reserva->funcion_id = $funcion->id;
                $reserva->usuario_id = $usuario->id;

                $reserva->save();

                $reserva->sillas()->attach($sillasID);


            }
        }
    }

    public function getUsuarios(){
        return Usuario::all();
    }

    public function getFunciones(){
        return Funcion::all();
    }

    public function getRandomSillas($funcion){
        return Silla::where('sala_id', $funcion->sala_id)
            ->inRandomOrder()->take(3)
            ->pluck('id')
            ->toArray();;
    }
}

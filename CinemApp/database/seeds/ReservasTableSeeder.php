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
                $silla = $this->getRandomSilla($funcion);

                $key = array_rand($estados);
                $estado = $estados[$key];

                Reserva::insert([
                    'estado' => $estado,
                    'funcion_id' => $funcion->id,
                    'usuario_id' => $usuario->id,
                    'silla_id' => $silla->id
                ]);
            }
        }
    }

    public function getUsuarios(){
        return Usuario::all();
    }

    public function getFunciones(){
        return Funcion::all();
    }

    public function getRandomSilla($funcion){
        return Silla::where('sala_id',$funcion->sala_id)->inRandomOrder()->first();
    }
}

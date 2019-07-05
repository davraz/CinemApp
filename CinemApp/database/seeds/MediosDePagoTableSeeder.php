<?php

use App\MedioDePago;
use App\Usuario;
use Illuminate\Database\Seeder;

class MediosDePagoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuarios = $this->getUsuarios();

        foreach ($usuarios as $usuario) {
            MedioDePago::Insert([
                'saldo' => 20000,
                'tipo' => 'Tarjeta de cine',
                'usuario_id' => $usuario->id
            ]);

            MedioDePago::Insert([
                'saldo' => 5000,
                'tipo' => 'Tarjeta de crédito',
                'usuario_id' => $usuario->id
            ]);
        }
    }

    public function getUsuarios()
    {
        return Usuario::all();
    }
}

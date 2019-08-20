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
                'saldo' => 100000,
                'tipo' => 'TarjetaDeCine',
                'usuario_id' => $usuario->id
            ]);

            MedioDePago::Insert([
                'saldo' => 1200000,
                'tipo' => 'TarjetaDeCredito',
                'numero' => '1111-2222-3333-4444-5555-6666',
                'expiracion' => '10/24',
                'cvv' => 765,
                'usuario_id' => $usuario->id
            ]);
        }
    }

    public function getUsuarios()
    {
        return Usuario::all();
    }
}

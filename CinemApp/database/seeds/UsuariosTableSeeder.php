<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'cedula' => 1017213810,
            'nombre' => 'Jose',
            'apellido' => 'Restrepo',
            'email' => Str::random(10) . '@gmail.com',
            'rol' => 'Cliente'
        ]);

        DB::table('usuarios')->insert([
            'cedula' => 11111111,
            'nombre' => 'David',
            'apellido' => 'Alcaraz',
            'email' => Str::random(10) . '@gmail.com',
            'rol' => 'Cliente'
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
            'cedula' => '1017213810',
            'nombre' => 'Jose',
            'apellido' => 'Restrepo',
            'email' => 'david-restre@hotmail.com',
            'rol' => 'Cliente',
            'password' => Hash::make('abcd1234')
        ]);

        DB::table('usuarios')->insert([
            'cedula' => '11111111',
            'nombre' => 'David',
            'apellido' => 'Alcaraz',
            'email' => 'david@gmail.com',
            'rol' => 'Cliente',
            'password' => Hash::make('abcd1234')
        ]);

        DB::table('usuarios')->insert([
            'cedula' => '00000',
            'nombre' => 'admin',
            'apellido' => 'admin',
            'email' => 'admin@gmail.com',
            'rol' => 'Admin',
            'password' => Hash::make('abcd1234')
        ]);
    }
}

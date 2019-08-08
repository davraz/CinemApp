<?php

use App\Sala;
use Illuminate\Database\Seeder;

class SalasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sala::insert([
           'numero' => 1,
            'filas' => 10,
            'columnas' => 7
        ]);

        Sala::insert([
            'numero' => 2,
            'filas' => 9,
            'columnas' => 6
        ]);

        Sala::insert([
            'numero' => 3,
            'filas' => 8,
            'columnas' => 5
        ]);
    }
}

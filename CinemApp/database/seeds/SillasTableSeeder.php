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

        foreach ($salas as $sala)
        {
            $sala->asignarSillas();
        }
    }
}

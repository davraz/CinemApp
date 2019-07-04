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
            Silla::insert([
                'letra' => 'A',
                'numero' => 1,
                'tipo' => 'General',
                'sala_id' => $sala->id
            ]);

            Silla::insert([
                'letra' => 'A',
                'numero' => 2,
                'tipo' => 'General',
                'sala_id' => $sala->id
            ]);

            Silla::insert([
                'letra' => 'A',
                'numero' => 3,
                'tipo' => 'General',
                'sala_id' => $sala->id
            ]);

            Silla::insert([
                'letra' => 'B',
                'numero' => 1,
                'tipo' => 'General',
                'sala_id' => $sala->id
            ]);

            Silla::insert([
                'letra' => 'B',
                'numero' => 2,
                'tipo' => 'General',
                'sala_id' => $sala->id
            ]);

            Silla::insert([
                'letra' => 'B',
                'numero' => 3,
                'tipo' => 'General',
                'sala_id' => $sala->id
            ]);

            Silla::insert([
                'letra' => 'C',
                'numero' => 1,
                'tipo' => 'Preferencial',
                'sala_id' => $sala->id
            ]);

            Silla::insert([
                'letra' => 'C',
                'numero' => 2,
                'tipo' => 'Preferencial',
                'sala_id' => $sala->id
            ]);

            Silla::insert([
                'letra' => 'C',
                'numero' => 3,
                'tipo' => 'Preferencial',
                'sala_id' => $sala->id
            ]);
        }
    }
}

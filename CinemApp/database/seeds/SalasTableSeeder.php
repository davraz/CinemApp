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
           'numero' => 1
        ]);

        Sala::insert([
            'numero' => 2
        ]);

        Sala::insert([
            'numero' => 3
        ]);
    }
}

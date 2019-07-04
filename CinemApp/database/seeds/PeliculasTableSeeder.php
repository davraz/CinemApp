<?php

use App\Pelicula;
use Illuminate\Database\Seeder;

class PeliculasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pelicula::insert([
            'titulo' => 'Toy Story 4',
            'director' => 'John Lasseter',
            'duracion' => 100,
            'genero' => 'animacion',
            'censura' => '4+',
            'portada' => 'http://t1.gstatic.com/images?q=tbn:ANd9GcRJUXmK61D6xj8qitOW7G4EBJ0W6J1opB0KHB51jNXcLweHCr9s'
        ]);
    }
}

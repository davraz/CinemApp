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

        Pelicula::insert([
            'titulo' => 'Spiderman: Far From Home',
            'director' => 'Jon Watts',
            'duracion' => 129,
            'genero' => 'Superhéroes',
            'censura' => '12+',
            'portada' => 'http://t1.gstatic.com/images?q=tbn:ANd9GcSUwilLyU4GtFBLzXkfM7f_KRep_7qXK9e30Zlix6JlO6DOoI82'
        ]);

        Pelicula::insert([
            'titulo' => 'Annabelle Comes Home',
            'director' => 'Gary Dauberman',
            'duracion' => 106,
            'genero' => 'Terror sobrenatural',
            'censura' => '12+',
            'portada' => 'http://t0.gstatic.com/images?q=tbn:ANd9GcRcrIV9omphHitYNfiMQNiIgx6vhH_DKa_kdxBB3NnKAmTzFbV0'
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Pelicula;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class FuncionesController extends Controller
{
    public function buscarFunciones(Request $request)
    {
        $validData = $request->validate([
            'date' => 'date|after_or_equal:today'
        ]);

        $peliculas = null;

        if (array_key_exists('date', $validData)) {
            $date = $validData['date'];

            $peliculas = Pelicula::whereHas('funciones', function ($query) use ($date) {
                $query->where('hora_inicio', '>=', date($date));
                $query->where('hora_inicio', '<=', date($date).' 23:59:59');
            })->get();
        }

        return view('BuscarFunciones', [
            'peliculas' => $peliculas
        ]);
    }
}

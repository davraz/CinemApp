<?php

namespace App\Http\Controllers;

use App\Pelicula;
use Carbon\Carbon;
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
            $date = new Carbon($date);

            $peliculas = Pelicula::all();
        }

        return view('BuscarFunciones', [
            'peliculas' => $peliculas
        ]);
    }
}
